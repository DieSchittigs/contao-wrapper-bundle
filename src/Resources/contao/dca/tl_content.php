<?php

$GLOBALS['TL_DCA']['tl_content']['palettes']['wrapperStart'] = '{type_legend},type,headline;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID;{invisible_legend:hide},invisible,start,stop';
$GLOBALS['TL_DCA']['tl_content']['palettes']['wrapperStop'] = '{type_legend},type;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests;{invisible_legend:hide},invisible,start,stop';


// Automatically add a wrapper stop element
$GLOBALS['TL_DCA']['tl_content']['config']['onsubmit_callback'][] = ['tl_content_wrapper', 'generateWrapperStop'];

class tl_content_wrapper extends tl_content
{

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
