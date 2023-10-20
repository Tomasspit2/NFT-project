<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Copyright;
use App\Entity\NftCollection;
use App\Entity\User;
use App\Entity\Artwork;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Smknstd\FakerPicsumImages\FakerPicsumImagesProvider;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private UserPasswordHasherInterface $passwordHasher;
    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();
        $faker->addProvider(new FakerPicsumImagesProvider($faker));

        $users = [];
        for ($i = 0; $i < 100; $i++) {
            $user = new User();
            $user->setFirstName($faker->firstName());
            $user->setLastName($faker->lastName());
            $user->setEmail($faker->Email());
            $user->setPassword($this->passwordHasher->hashPassword($user, 'password'));

            $manager->persist($user);

            $users[] = $user;
        }

        $copyrights = [];
        for ($i = 0; $i < 5; $i++) {
            $copyright = new Copyright();
            $copyright->setName($faker->word());

            $manager->persist($copyright);
        }
        $copyrights[] = $copyright;

        $collectionList = ['proof-collective', 'unbecoming-by-jimena-buena-vida', 'boredapeyachtclub', 'mutant-ape-yacht-club', 'bored-ape-kennel-club', 'bored-ape-chemistry-club', 'cruserafantasy', 'antasy-55', 'new-269', 'new-112', 'animetas', 'rtfkt-animus-egg', 'monkey-129', 'cool-cats-nft', 'guttercatgang', 'acclimatedmooncats', 'tubby-cats', 'the-doge-pound', 'gutterdogs', 'snoop-dogg-doggies', 'dog-nova'];

        for ($i = 0; $i < count($collectionList); $i++) {
            $collection = new NftCollection();
            $collection->setName($collectionList[$i]);
            $collection->setNftUrl('https://opensea.io/fr/collection/' . $collectionList[$i]);

            if (!empty($users)) {
                $randomIndex = rand(0, count($users) - 1);
                $collection->addUser($users[$randomIndex]);
            }

            $collections[] = $collection;
            $manager->persist($collection);
        }


        $categoryList = ['NFT', 'NSFW', '3d', 'Animals', 'Persons'];

        $categories = [];

        for ($i = 0; $i < count($categoryList); $i++) {
            $category = new Category();
            $category->setName($categoryList[$i]);

            $categories[] = $category;
            $manager->persist($category);
        }
        $artworks = [];

        for ($i = 0; $i < 100; $i++) {
            $artwork = new Artwork();
            $artwork->setName($faker->word());
            $artwork->setPrice($faker->numberBetween(0, 200));
            $artwork->setImageUrl($faker->imageUrl(width: 800, height: 600));

            if (!empty($categories)) {
                $randomIndex = rand(0, count($categories) - 1);
                $artwork->addCategory($categories[$randomIndex]);
            }

            if (!empty($users)) {
                $randomIndexUsers = rand(0, count($users) -1);
                $artwork->addUser($users[$randomIndexUsers]);
            }

            if (!empty($copyrights)) {
                $randomIndexCopyright = rand(0, count($copyrights) -1);
                $artwork->addCopyright($copyrights[$randomIndexCopyright]);
            }

            $manager->persist($artwork);
        }

        $manager->flush();

    }

}
