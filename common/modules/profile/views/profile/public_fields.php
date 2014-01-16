<?php if($profile && !$profile->isNewRecord && $profile->getProfileFields()) {
        $attr = array();
        $data = array();
        foreach($profile->getProfileFields() as $field) {
            $attr[] = array('name' =>  Yum::t($field), 'label' => Yum::t($field));
            $data[Yum::t($field)] = $profile->$field;
        }

        $this->widget('bootstrap.widgets.TbDetailView', array(
            'data'=>$data,
            'attributes'=>$attr,
            'htmlOptions'=>array('class'=>'table_profile_fields')
            ));
} ?>
<div class="clear"></div>
