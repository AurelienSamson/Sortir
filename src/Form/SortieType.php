<?php

namespace App\Form;

use App\Entity\Lieux;
use App\Entity\Sorties;
use App\Entity\Villes;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Security\Core\Security;

class SortieType extends AbstractType
{
    public function __construct(Security $security)
    {
        $this->security = $security;
    }
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom',TextType::class, ['label'=>"Nom de la sortie"])
            ->add('datedebut', DateType::class,['label'=>"Date et heure de la sortie",'widget' => 'choice'])
            ->add('datecloture',DateType::class,['label'=>"Date limite d'inscription", 'widget' => 'choice'])
            ->add('nbinscriptionmax',NumberType::class, ['label'=>"Nombre de place"])
            ->add('duree', NumberType::class, ['label'=>"Durée"])
            ->add('descriptioninfos', TextType::class, ['label'=>"Description et infos"])
            //->add('ville', ['label'=>"Ville organisatrice"])
            ->add('lieux_no_lieu', LieuType::class)


            ->add('organisateur', TextType::class ,["label"=>"Organisateur", "data"=>$this->security->getUser()->getId()])

            //->add('etatsortie')
            //->add('urlphoto')

            ->add('Enregistrer',SubmitType::class);
            //->add('Publier',SubmitType::class);
            //->add('Annuler',SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Sorties::class,
        ]);
    }
}
