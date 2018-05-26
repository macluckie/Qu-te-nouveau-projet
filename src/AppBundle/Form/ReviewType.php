<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Doctrine\ORM\EntityRepository;

class ReviewType extends AbstractType
{
  /**
* {@inheritdoc} Including all fields from Review entity.
*/

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('text', TextareaType::class, array('attr'=>array('maxlength'=>250, 'label'=> 'description')))
        ->add('publicationDate', DateType::class, array('data'=> new \DateTime('now')))
        ->add('note', IntegerType::class, array('attr'=>array('min'=>0, 'label'=> 'Note')))
        ->add('userRated', EntityType::class, array(
          'class'=>'AppBundle\Entity\User',
          'query_builder'=> function (EntityRepository $er) {
            return $er->createQueryBuilder('u')
                      ->orderBy('u.lastName', 'ASC');
          },
            'label'=>'lastName'))
        ->add('reviewAuthor')
        ->add('save', SubmitType::class)
        ->getForm();
    }


/**
* {@inheritdoc} Targeting Review entity
*/

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
        'data_class' => 'AppBundle\Entity\Review'
        ));
    }
}
