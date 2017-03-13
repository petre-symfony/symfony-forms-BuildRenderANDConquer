<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class GenusFormType extends AbstractType{
  public function buildForm(FormBuilderInterface $builder, array $options) {
    $builder->add('name')
      ->add('speciesCount')
      ->add('subFamily', EntityType::class, [
        'placeholder' => 'Choose a Sub Family'
      ])      
      ->add('funFact')
      ->add('isPublished', ChoiceType::class, [
        'choices' => [
          'Yes' => true,
          'No'  => false  
        ]    
      ])
      ->add('firstDiscoveredAt');      
  }
  
  public function configureOptions(OptionsResolver $resolver) {
    $resolver->setDefaults([
       'data_class' => 'AppBundle\Entity\Genus' 
    ]);
  }
}