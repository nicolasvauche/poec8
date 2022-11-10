<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Post;
use App\Entity\Tag;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class PostFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $category = new Category();
        $category->setName('Musique');
        $manager->persist($category);

        $tag = new Tag();
        $tag->setName('Au début');
        $manager->persist($tag);

        $post = new Post();
        $post->setTitle('Mon premier article')
            ->setCover('')
            ->setContent('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus blanditiis consectetur cupiditate doloremque dolores esse ex natus, quo sint tempora voluptatibus, voluptatum? Atque dolorem illum inventore maxime nulla. Optio, praesentium.')
            ->setIsActive(true)
            ->setCategory($category)
            ->addTag($tag)
            ->setUser($this->getReference('admin'));
        $manager->persist($post);

        $manager->flush();
    }

    public function getOrder()
    {
        return 2;
    }
}
