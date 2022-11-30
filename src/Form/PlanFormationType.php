<?php
namespace App\Form;

use App\Entity\Plan_formation;
use App\Entity\Client;
use App\Entity\Formation;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class PlanFormationType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
			->add('client', EntityType::class, array('class' => Client::class, 'choice_label' => 'nom', 'multiple' => false))
			->add('formation', EntityType::class, array('class' => Formation::class, 'choice_label' => 'affichage', 'multiple' => false))
			->add('effectue', CheckboxType::class, array('required' => false))
            ->add('Valider', SubmitType::class)
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Plan_formation::class
        ));
    }
}