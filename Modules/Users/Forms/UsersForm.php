<?php namespace Modules\Users\Forms;

use Kris\LaravelFormBuilder\Form;

class UsersForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('first_name', 'text',[
                'label'=>'First Name',
                'attr'=>[
                    'class'=>'form-control','required'
                ]
            ])
            ->add('last_name', 'text',[
                'label'=>'Last Name',
                'attr'=>[
                    'class'=>'form-control','required'
                ]
            ])
            ->add('phone', 'text',[
                'label'=>'Phone Number',
                'attr'=>[
                    'class'=>'form-control','required'
                ]
            ])
            ->add('address', 'textarea',[
                'label'=>'Address',
                'attr'=>[
                    'class'=>'form-control','required',
                    'rows'=>2
                ]
            ])
            ->add('email', 'text',[
                'attr'=>[
                    'class'=>'form-control','required'
                ]
            ])
            ->add('password', 'password',[
                'attr'=>[
                    'class'=>'form-control required',
                    'value'=>''
                ]
            ])
            ->add('confirm_password', 'password',[
                'label'=>'Confirm Password',
                'attr'=>[
                    'class'=>'form-control required'
                ]
            ])
            ->add('activated', 'choice', [
                'label'=>'Activated?',
                'choices' => [
                    0 => 'No',
                    1 => 'Yes'
                ],
                'selected'=>0,
                'expanded' => true,
                'multiple' => false
            ])
            ->add('age_group', 'select', [
                'label'=>'Age Group',
                'choices' => [
                    '19 - 30' => '19 - 30',
                    '31 - 50' => '31 - 50',
                    '51 - 70' => '51 - 70',
                    '71 - above' => '71 - above'
                ],
                'attr'=>[
                    'class'=>'form-control required',
                    'required' => true,
                ],
                'selected'=>0,
                'expanded' => true,
                'multiple' => false
            ])

            ->add('gender', 'select', [
                'label'=>'Gender',
                'choices' => [
                    'male' => 'Male',
                    'female' => 'Female'
                ],
                'attr'=>[
                    'class'=>'form-control required',
                    'required' => true,
                ],
                'selected'=>0,
                'expanded' => true,
                'multiple' => false
            ])

            ->add('marital_status', 'select', [
                'label'=>'Marital Status',
                'choices' => [
                    'single' => 'Single',
                    'married' => 'Married',
                    'divorce' => 'Divorce',
                ],
                'attr'=>[
                    'class'=>'form-control required',
                    'required' => true,
                ],
                'selected'=>0,
                'expanded' => true,
                'multiple' => false
            ])

            ->add('race', 'select', [
                'label'=>'Race',
                'choices' => [
                    'african' => 'African',
                    'asian' => 'Asian',
                    ''
                ],
                'attr'=>[
                    'class'=>'form-control required',
                    'required' => true,
                ],
                'selected'=>0,
                'expanded' => true,
                'multiple' => false
            ])
            ->add('nationality', 'select', [
                'label'=>'Nationality',
                'choices' => [
                    'african' => 'African',
                    'asian' => 'Asian',
                    ''
                ],
                'attr'=>[
                    'class'=>'form-control required',
                    'required' => true,
                ],
                'selected'=>0,
                'expanded' => true,
                'multiple' => false
            ])
            ->add('preferred_demography', 'select', [
                'label'=>'Preferred Demography',
                'choices' => [
                    'age_group' => 'Age Group',
                    'gender' => 'Gender',
                    'race' => 'Race',
                    'nationality' => 'Nationality'
                ],
                'attr'=>[
                    'class'=>'form-control select2 required',
                    'required' => true,
                    'multiple' => true,
                ],
            ])
            ->add('interests', 'select',[
                'label'=>'Interests',
                'attr'=>[
                    'class'=>'form-control required',
                    'required' => true,
                    'multiple' => true,
                    'id' => 'interests'
                ]
            ])
            ->add('interest_id', 'hidden',[
                'attr'=>[
                    'class'=>'form-control required',
                    'required' => true,
                    'autocomplete'=>'off',
                    'type' => 'hidden'
                ]
            ])
            ->add('avatar', 'file', [
                'label' => 'Avatar'
            ]);
    }
}