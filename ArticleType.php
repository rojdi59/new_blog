<?php

namespace App\Form;

use App\Entity\Article;

use App\Entity\Categorie;

use App\Entity\SousCategorie;

use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormInterface;
use App\Repository\SousCategorieRepository;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class ArticleType extends AbstractType
{

    private $sousCategorieRepository;

    public function __construct(SousCategorieRepository $sousCategorieRepository)
    {
        $this->sousCategorieRepository = $sousCategorieRepository;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titreArticle', TextType::class, [
                'label' => false,
                'required' => false,
                'attr' => ['class' => 'form-control mt-5']
            ])
            ->add('contenuArticle', TextType::class, [
                'label' => false,
                'required' => false,
                'attr' => ['class' => 'form-control mt-2']
            ])
            

            ->add('save', SubmitType::class, [
                'attr' => ['class' => 'btn btn-success mt-5'],
                'label' => 'Valider '
            ])
            ->add('idCategorie', EntityType::class, [
                'class' => Categorie::class,
                'mapped' => false,
                'choice_label' => "nomCategorie",
                'placeholder' => 'Choisissez la catégorie',
                'label' => false,
                'attr' => ['class' => 'form-select text-center mt-2']
            ]);

        $formModifier = function (FormInterface $form, Categorie $categorie = null) {
            $sousCategories = null === $categorie ? [] : $this->sousCategorieRepository->findByIdCategorie(2);

            $form->add('idSousCategorie', EntityType::class, [
                'class' => SousCategorie::class,
                'placeholder' => 'Choisissez la sous-catégorie',
                'choice_label' => 'nomSousCategorie',
                'choices' => $sousCategories,
                'multiple' => false,
                'label' => false,
                'attr' => [
                    'class' => 'form-select text-center mt-2'
                ]
            ]);
        };

        //->add('dateAnnonce')
        //->add('latitude')
        //->add('longitude')
        $builder->get('idCategorie')->addEventListener(
            FormEvents::POST_SUBMIT,
            function (FormEvent $event) use ($formModifier) {
                $categorie = $event->getForm()->getData();
                $formModifier($event->getForm()->getParent(), $categorie);
            }
        );
        $builder->addEventListener(
            FormEvents::PRE_SET_DATA,
            function (FormEvent $event) use ($formModifier) {
                $data = $event->getData();
                $formModifier($event->getForm(), $data->getIdSousCategorie());
            }
        );

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
            'allow_extra_fields' => true
        ]);
    }
}