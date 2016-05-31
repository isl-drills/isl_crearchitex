<?php

namespace ISL\CrearchitexBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ProjetType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('description')
            ->add('image', ImageType::class)
            ->add('categorie',  EntityType::class,[
                "class"=>"ISLCrearchitexBundle:Categorie",
                "choice_label"=>"nom",
                "multiple"=>true]
            )  
            ->add('save', SubmitType::class, array('label' => 'envoi'));
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ISL\CrearchitexBundle\Entity\Projet'
        ));
    }
}
