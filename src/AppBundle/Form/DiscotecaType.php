<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class DiscotecaType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nombre',TextType::class, [
            'label'=> 'Nombre Discoteca: ',
            'attr'=>['class' => 'form-control '],
        ])
        ->add('ubicacion',TextType::class, [
            'label'=> 'Ubicación: ',
            'attr'=>['class' => 'form-control '],
        ])
        ->add('imagen',TextType::class,[
            'label'=> 'Imagen: ',
            'attr'=>['class' => 'form-control '],
        ])
        ->add('cif',TextType::class,[
            'label'=> 'CIF: ',
            'attr'=>['class' => 'form-control '],
        ])
        ->add('save', SubmitType::class, array('label' => 'Guardar',  'attr' => array('class'=>'btn btn-primary')));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Discoteca'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_discoteca';
    }


}
