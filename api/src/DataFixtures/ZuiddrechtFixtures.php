<?php

namespace App\DataFixtures;

use App\Entity\Accommodation;
use App\Entity\AccommodationProperty;
use App\Entity\Place;
use App\Entity\PlaceProperty;
use App\Entity\Property;
use Conduction\CommonGroundBundle\Service\CommonGroundService;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Ramsey\Uuid\Uuid;
use DateTime;

class ZuiddrechtFixtures extends Fixture
{
    private $commonGroundService;
    private $params;

    public function __construct(CommonGroundService $commonGroundService, ParameterBagInterface $params)
    {
        $this->commonGroundService = $commonGroundService;
        $this->params = $params;
    }

    public function load(ObjectManager $manager)
    {
        if (
            !$this->params->get('app_build_all_fixtures') &&
            $this->params->get('app_domain') != 'zuiddrecht.nl' && strpos($this->params->get('app_domain'), 'zuiddrecht.nl') == false &&
            $this->params->get('app_domain') != 'zuid-drecht.nl' && strpos($this->params->get('app_domain'), 'zuid-drecht.nl') == false
        ) {
            return false;
        }

        $id = Uuid::fromString('db91b486-cbbb-47aa-9771-77862fda6c15');
        $place = New Place();
        $place->setName('Huis der gemeente');
        $place->setDescription('Het gemeente huis van zuid-drecht');
        $place->setOrganization($this->commonGroundService->cleanUrl(['component'=>'wrc', 'type'=>'organizations', 'id'=>'4d1eded3-fbdf-438f-9536-8747dd8ab591']));
        $place->setPublicAccess(true);
        $place->setSmokingAllowed(false);
        $openingTime = new DateTime();
        $openingTime ->setTime(8, 00);
        $place->setOpeningTime($openingTime);
        $closingTime = new DateTime();
        $closingTime ->setTime(17, 00);
        $place->setClosingTime($closingTime);
        $manager->persist($place);
        $place->setId($id);
        $manager->persist($place);
        $manager->flush();
        $place = $manager->getRepository('App:Place')->findOneBy(['id'=> $id]);

        $id = Uuid::fromString('24eafc4c-14fa-432b-84ae-06356804ac1d');
        $accommodation = New Accommodation();
        $accommodation->setPlace($place);
        $accommodation->setName('Raadszaal');
        $accommodation->setDescription('Raadszaal');
        $manager->persist($accommodation);
        $accommodation->setId($id);
        $manager->persist($accommodation);
        $manager->flush();
        $accommodation = $manager->getRepository('App:Accommodation')->findOneBy(['id'=> $id]);

        $id = Uuid::fromString('e65a9fcc-488e-4734-aa64-33de4f635bb8');
        $accommodation = New Accommodation();
        $accommodation->setPlace($place);
        $accommodation->setName('Trouwzaal');
        $accommodation->setDescription('Trouwzaal');
        $manager->persist($accommodation);
        $accommodation->setId($id);
        $manager->persist($accommodation);
        $manager->flush();
        $accommodation = $manager->getRepository('App:Accommodation')->findOneBy(['id'=> $id]);

        $id = Uuid::fromString('cd4cfa43-0d1e-4053-8325-f01b793d9a0d');
        $accommodation = New Accommodation();
        $accommodation->setPlace($place);
        $accommodation->setName('De bonte zaal');
        $accommodation->setDescription('vergader ruimte');
        $manager->persist($accommodation);
        $accommodation->setId($id);
        $manager->persist($accommodation);
        $manager->flush();
        $accommodation = $manager->getRepository('App:Accommodation')->findOneBy(['id'=> $id]);

        $id = Uuid::fromString('8f30215c-d778-480c-ac8c-8492d17c6a15');
        $place = New Place();
        $place->setName('Cafe de zotte raaf');
        $place->setDescription('Het gezeligste dijkcafe van nederland');
        $place->setOrganization($this->commonGroundService->cleanUrl(['component'=>'wrc', 'type'=>'organizations', 'id'=>'4d1eded3-fbdf-438f-9536-8747dd8ab591']));
        $place->setPublicAccess(true);
        $place->setSmokingAllowed(false);
        $openingTime = new DateTime();
        $openingTime ->setTime(16, 00);
        $place->setOpeningTime($openingTime);
        $closingTime = new DateTime();
        $closingTime ->setTime(01, 00);
        $place->setClosingTime($closingTime);
        $manager->persist($place);
        $place->setId($id);
        $manager->persist($place);
        $manager->flush();
        $place = $manager->getRepository('App:Place')->findOneBy(['id'=> $id]);

        $id = Uuid::fromString('75f36e60-c798-41bb-ae11-4bc4e23aa147');
        $accommodation = New Accommodation();
        $accommodation->setPlace($place);
        $accommodation->setName('Tafel 1');
        $accommodation->setDescription('Trouwzaal');
        $manager->persist($accommodation);
        $accommodation->setId($id);
        $manager->persist($accommodation);
        $manager->flush();
        $accommodation = $manager->getRepository('App:Accommodation')->findOneBy(['id'=> $id]);

        $id = Uuid::fromString('014016d0-292e-4373-8bd2-4a0e427ac059');
        $accommodation = New Accommodation();
        $accommodation->setPlace($place);
        $accommodation->setName('Tafel 2');
        $accommodation->setDescription('Trouwzaal');
        $manager->persist($accommodation);
        $accommodation->setId($id);
        $manager->persist($accommodation);
        $manager->flush();
        $accommodation = $manager->getRepository('App:Accommodation')->findOneBy(['id'=> $id]);

        $id = Uuid::fromString('751c8a9f-f7cf-4f45-9c16-72ed74d4eba1');
        $accommodation = New Accommodation();
        $accommodation->setPlace($place);
        $accommodation->setName('Bar');
        $accommodation->setDescription('Bar');
        $manager->persist($accommodation);
        $accommodation->setId($id);
        $manager->persist($accommodation);
        $manager->flush();
        $accommodation = $manager->getRepository('App:Accommodation')->findOneBy(['id'=> $id]);

        $id = Uuid::fromString('f5b473e9-a2d8-4383-b268-265c340f4bc5');
        $place = New Place();
        $place->setName('Restautant Goudlust');
        $place->setDescription('In deze vormalige dijkgraaf woning geniet u van voortreffelijk eten bereid met locale ingredienten');
        $place->setOrganization($this->commonGroundService->cleanUrl(['component'=>'wrc', 'type'=>'organizations', 'id'=>'4d1eded3-fbdf-438f-9536-8747dd8ab591']));
        $place->setPublicAccess(true);
        $place->setSmokingAllowed(false);
        $openingTime = new DateTime();
        $openingTime ->setTime(11, 00);
        $place->setOpeningTime($openingTime);
        $closingTime = new DateTime();
        $closingTime ->setTime(23, 00);
        $place->setClosingTime($closingTime);
        $manager->persist($place);
        $place->setId($id);
        $manager->persist($place);
        $manager->flush();
        $place = $manager->getRepository('App:Place')->findOneBy(['id'=> $id]);

        $id = Uuid::fromString('c6f5ec24-7321-4176-a588-a3bb0bf2b62e');
        $accommodation = New Accommodation();
        $accommodation->setPlace($place);
        $accommodation->setName('Tafel 1');
        $accommodation->setDescription('Trouwzaal');
        $manager->persist($accommodation);
        $accommodation->setId($id);
        $manager->persist($accommodation);
        $manager->flush();
        $accommodation = $manager->getRepository('App:Accommodation')->findOneBy(['id'=> $id]);

        $id = Uuid::fromString('21cc4b1f-f9d6-4059-95e3-67535d5dfb9a');
        $accommodation = New Accommodation();
        $accommodation->setPlace($place);
        $accommodation->setName('Tafel 2');
        $accommodation->setDescription('Trouwzaal');
        $manager->persist($accommodation);
        $accommodation->setId($id);
        $manager->persist($accommodation);
        $manager->flush();
        $accommodation = $manager->getRepository('App:Accommodation')->findOneBy(['id'=> $id]);

        $id = Uuid::fromString('9f847ce1-eeb6-4e86-ad58-86dda3e18302');
        $accommodation = New Accommodation();
        $accommodation->setPlace($place);
        $accommodation->setName('Graven zaal');
        $accommodation->setDescription('In deze kleine zaal kunt u tot max 12 personen prive dineren');
        $manager->persist($accommodation);
        $accommodation->setId($id);
        $manager->persist($accommodation);
        $manager->flush();
        $accommodation = $manager->getRepository('App:Accommodation')->findOneBy(['id'=> $id]);

        $id = Uuid::fromString('dae29298-7068-4c03-8b60-92c4056ed99f');
        $place = New Place();
        $place->setName('Hotel Dijkzicht');
        $place->setDescription('Gevestigd in een oud-tol huis kijkt dit prachtige hotel uit op de drechtse dijk ');
        $place->setOrganization($this->commonGroundService->cleanUrl(['component'=>'wrc', 'type'=>'organizations', 'id'=>'4d1eded3-fbdf-438f-9536-8747dd8ab591']));
        $place->setPublicAccess(true);
        $place->setSmokingAllowed(false);
        $openingTime = new DateTime();
        $openingTime ->setTime(00, 00);
        $place->setOpeningTime($openingTime);
        $closingTime = new DateTime();
        $closingTime ->setTime(00, 00);
        $place->setClosingTime($closingTime);
        $manager->persist($place);
        $place->setId($id);
        $manager->persist($place);
        $manager->flush();
        $place = $manager->getRepository('App:Place')->findOneBy(['id'=> $id]);

        $id = Uuid::fromString('66e957d7-f3e1-4115-b5d7-b8a617dc0208');
        $accommodation = New Accommodation();
        $accommodation->setPlace($place);
        $accommodation->setName('Kamer 1');
        $accommodation->setDescription('Trouwzaal');
        $manager->persist($accommodation);
        $accommodation->setId($id);
        $manager->persist($accommodation);
        $manager->flush();
        $accommodation = $manager->getRepository('App:Accommodation')->findOneBy(['id'=> $id]);

        $id = Uuid::fromString('2272cdd8-05ea-4f3e-b87a-0717bab1866c');
        $accommodation = New Accommodation();
        $accommodation->setPlace($place);
        $accommodation->setName('Kamer 2');
        $accommodation->setDescription('Trouwzaal');
        $manager->persist($accommodation);
        $accommodation->setId($id);
        $manager->persist($accommodation);
        $manager->flush();
        $accommodation = $manager->getRepository('App:Accommodation')->findOneBy(['id'=> $id]);

        $id = Uuid::fromString('1c1b928d-3d71-416d-a522-46e2da4a1fb7');
        $place = New Place();
        $place->setName('Camping de alpen koe');
        $place->setDescription('Camperen bij de boer');
        $place->setOrganization($this->commonGroundService->cleanUrl(['component'=>'wrc', 'type'=>'organizations', 'id'=>'4d1eded3-fbdf-438f-9536-8747dd8ab591']));
        $place->setPublicAccess(true);
        $place->setSmokingAllowed(false);
        $openingTime = new DateTime();
        $openingTime ->setTime(00, 00);
        $place->setOpeningTime($openingTime);
        $closingTime = new DateTime();
        $closingTime ->setTime(00, 00);
        $place->setClosingTime($closingTime);
        $manager->persist($place);
        $place->setId($id);
        $manager->persist($place);
        $manager->flush();
        $place = $manager->getRepository('App:Place')->findOneBy(['id'=> $id]);

        $id = Uuid::fromString('2779147c-8429-4c86-8ba1-39b74c83ee20');
        $accommodation = New Accommodation();
        $accommodation->setPlace($place);
        $accommodation->setName('Caravan plaats');
        $accommodation->setDescription('Trouwzaal');
        $manager->persist($accommodation);
        $accommodation->setId($id);
        $manager->persist($accommodation);
        $manager->flush();
        $accommodation = $manager->getRepository('App:Accommodation')->findOneBy(['id'=> $id]);

        $id = Uuid::fromString('5714af42-9660-4041-8d22-b737a5936bcd');
        $accommodation = New Accommodation();
        $accommodation->setPlace($place);
        $accommodation->setName('Tentplaats');
        $accommodation->setDescription('Trouwzaal');
        $manager->persist($accommodation);
        $accommodation->setId($id);
        $manager->persist($accommodation);
        $manager->flush();
        $accommodation = $manager->getRepository('App:Accommodation')->findOneBy(['id'=> $id]);

        $manager->flush();
    }
}