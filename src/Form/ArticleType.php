<?php

namespace App\Form;

use App\Entity\Article;
use App\Entity\SousCategorie;
use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titreArticle', TextType::class, ['attr' => ['class' => 'form-control', 'placeholder' => 'Votre titre'], 'label' => false])
            ->add('contenuArticle', CKEditorType::class, ['attr' => ['class' => 'form-control', 'placeholder' => 'Votre contenu', 'rows' => 10], 'label' => false])
            ->add('idSousCategorie', EntityType::class, [
                'class' => SousCategorie::class,
                'choice_label' => 'nomSousCategorie',
                'attr' => ['class' => 'form-select w-100'],
                'label' => false
            ])
            ->add('save', SubmitType::class, ['attr' => ['class' => 'btn btn-success'], 'label' => 'Valider'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
    
}
