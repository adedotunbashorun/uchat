<?php namespace modules\Pages\Forms;

use Kris\LaravelFormBuilder\Form;

class PageForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('title', 'text')
            ->add('tagline', 'text')
            ->add('meta_title', 'text')
            ->add('meta_keywords', 'text')
            ->add('meta_description', 'textarea')
             ->add('slug', 'text')
            ->add('status', 'select', [
                'choices' => [1 => 'live', 0 => 'draft'],
                'empty_value' => '- Select status -',
                'selected'=>1
            ])
            ->add('css', 'text')
            ->add('js', 'text')
            ->add('icon', 'text')
            ->add('body', 'textarea',[
                'attr'=>['class'=>'form-control summernote']
            ])
            ->add('image', 'file')
            ->add('is_home', 'choice', [
                'label'=>'Is Home?',
                'choices' => [
                    0 => 'No',
                    1 => 'Yes'
                ],
                'selected'=>0,
                'expanded' => true,
                'multiple' => false
            ])
            ->add('template', 'select',[
                'label'=>'Template',
                'empty_value'=>'-- select template --',
                'choices'=>$this->getData('template'),
                'selected'=>'default'
            ])
            ->add('module', 'select',[
                'label'=>'Module',
                'empty_value'=>'-- select module --',
                'choices'=>$this->getData('modules'),
            ])
            ->add('parent_id', 'select',[
                'label'=>'Parent',
                'empty_value'=>'-- select parent --',
                'choices'=>$this->getData('pages'),
            ])
            ->add('add_to_menu', 'select',[
                'label'=>'Add to Menu',
                'choices'=>$this->getData('menus'),
                'attr'=>['multiple']
            ]);
    }
}