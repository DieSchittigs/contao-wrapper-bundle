<?php

use DieSchittigs\ContaoWrapperBundle\ClassesModel;


foreach ($GLOBALS['TL_DCA']['tl_content']['palettes'] as $key => &$val) {
    if ($key == '__selector__' or $key == 'default') continue;
    $val = str_replace('{expert_legend:hide}', '{design_legend},customClass;{expert_legend:hide}', $val);
}

$GLOBALS['TL_DCA']['tl_content']['fields']['customClass'] = [
    'label'                   => &$GLOBALS['TL_LANG']['tl_content']['customClass'],
    'exclude'                 => true,
    'inputType'               => 'select',
    'options_callback'        => ['tl_content_helper', 'getClasses'],
    'eval'                    => array('tl_class' => 'w50', 'multiple' => true, 'chosen' => true),
    'sql'                     => "blob NULL"
];

// Automatically add a wrapper stop element
$GLOBALS['TL_DCA']['tl_content']['config']['onsubmit_callback'][] = ['tl_content_helper', 'generateWrapperStop'];

class tl_content_helper extends tl_content
{
    public function getClasses(DataContainer $dc)
    {
        $objClasses = ClassesModel::findByShowOnElement(1);

        if ($objClasses === null) return;

        $arrReturn = [];
        while ($objClasses->next()) {

            if ($objClasses->excludeElements && @!in_array($dc->activeRecord->type, unserialize($objClasses->elementTypes))) {
                continue;
            }

            $arrReturn[$objClasses->id] = $objClasses->name . ' [' . $objClasses->cssClass . ']';
        }

        return $arrReturn;
    }

    public function generateWrapperStop(DataContainer $dc)
    {
        if ($dc->activeRecord->type != "wrapperStart") return;
        if (!empty($dc->activeRecord->tstamp)) return;

        $model = new \ContentModel();
        $model->type = 'wrapperStop';
        $model->ptable = $dc->activeRecord->ptable;
        $model->pid = $dc->activeRecord->pid;
        $model->tstamp = Date::floorToMinute();
        $model->sorting = $dc->activeRecord->sorting * 2;

        $model->save();
    }
}
