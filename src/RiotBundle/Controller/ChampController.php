<?php

namespace RiotBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use RiotBundle\Entity\ChampionInfo;
use RiotBundle\Entity\UserChamps;
use RiotBundle\Entity\Champion;
use RiotBundle\Entity\FreeChampion;

class ChampController extends FOSRestController
{
    public function getChampsAction()
    {
        $data = $this->getDoctrine()
            ->getRepository('RiotBundle:Champion')
            ->findAll();
        return $data;
    }

    public function getChampsIdAction($id)
    {
        $data = $this->getDoctrine()
            ->getRepository('RiotBundle:Champion')
            ->findBy(array('idRiot' => $id));
        return $data;
    }

    public function getVersionAction() {
        $url = "https://global.api.pvp.net/api/lol/static-data/euw/v1.2/versions?api_key=a285fc44-95aa-4b4e-9a9b-130dace287eb";
        $handler = curl_init($url);
        curl_setopt($handler, CURLOPT_ENCODING ,"");
        curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);
        $res = json_decode(curl_exec($handler), true);
        return  $res[0];
    }

    public function getChampsInfoAction($id)
    {
        $url = "https://global.api.pvp.net/api/lol/static-data/euw/v1.2/champion/" . $id . "?locale=fr_FR&champData=all&api_key=a285fc44-95aa-4b4e-9a9b-130dace287eb";
        $handler = curl_init($url);
        curl_setopt($handler, CURLOPT_ENCODING ,"");
        curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);
        $res = json_decode(curl_exec($handler), true);
        $champInfo = new ChampionInfo();
        $champInfo->setAllytips($res["allytips"]);
        $champInfo->setEnemytips($res["enemytips"]);
        $champInfo->setId($res["id"]);
        $champInfo->setImage($res["image"]);
        $champInfo->setInfo($res["info"]);
        $champInfo->setName($res["key"]);
        $champInfo->setPartype($res["partype"]);
        $champInfo->setPassive($res["passive"]);
        $champInfo->setRecommended($res["recommended"]);
        $champInfo->setSkins($res["skins"]);
        $champInfo->setSpells($res["spells"]);
        $champInfo->setTags($res["tags"]);
        $champInfo->setTitle($res["title"]);
        curl_close($handler);
        return $champInfo;
    }

    public function newUserChampAction($idUser, $idChamp) {
        $em = $this->get('doctrine.orm.entity_manager');
        $elem = new UserChamps();
        $elem->setIdUser($idUser);
        $elem->setIdChamp($idChamp);
        $em->persist($elem);
        $em->flush();
        return $elem;
    }

    public function removeUserChampAction($idUser, $idChamp) {
        $em = $this->get('doctrine.orm.entity_manager');
        $elem = $this->getDoctrine()
            ->getRepository('RiotBundle:UserChamps')
            ->findBy(array('idUser' => $idUser, 'idChamp' => $idChamp));
        if ($elem) {
            $em->remove($elem[0]);
            $em->flush();
        }
        return $elem;
    }

    public function getFreeChampsAction()
    {
        $data = $this->getDoctrine()
            ->getRepository('RiotBundle:FreeChampion')
            ->findAll();
        return $data;
    }

    public function getUserChampsAction($id)
    {
        $data = $this->getDoctrine()
            ->getRepository('RiotBundle:UserChamps')
            ->findBy(array('idUser' => $id));
        return $data;
    }

    public function getOtherChampsAction($id) {
        $myChamp = $this->getDoctrine()
            ->getRepository('RiotBundle:UserChamps')
            ->findBy(array('idUser' => $id));
        if ($myChamp) {
            $allChamp = $this->getDoctrine()
                ->getRepository('RiotBundle:UserChamps')
                ->findAll();
            $data = array();
            foreach ($allChamp as $champ) {
                if (!in_array($champ, $myChamp)) {
                    array_push($data, $champ);
                }
            }
        }
        return $data;
    }

    public function newSaveAllAction() {
        $em = $this->get('doctrine.orm.entity_manager');
        $connection = $em->getConnection();
        $platform   = $connection->getDatabasePlatform();
        $connection->executeUpdate($platform->getTruncateTableSQL('free_champion', true /* whether to cascade */));
        unset($doctrine);

        $url = 'https://euw.api.pvp.net/api/lol/euw/v1.2/champion?api_key=a285fc44-95aa-4b4e-9a9b-130dace287eb';
        $handler = curl_init($url);
        curl_setopt($handler, CURLOPT_ENCODING ,"");
        curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);
        $res = json_decode(curl_exec($handler), true);
        $tabChamp = array();
        for ($i = 0; $i < count($res["champions"]); $i++) {
            for ($i = 0; $i < count($res["champions"]); $i++) {
                $id = $res["champions"][$i]["id"];
                $result = $this->getDoctrine()
                    ->getRepository("RiotBundle:Champion")
                    ->findOneBy(array ('idRiot' => $id));
                if (count($result) == 0) {
                    $url = "https://global.api.pvp.net/api/lol/static-data/euw/v1.2/champion/" .
                        $id
                        . "?champData=image&api_key=a285fc44-95aa-4b4e-9a9b-130dace287eb";
                    $handler = curl_init($url);
                    curl_setopt($handler, CURLOPT_ENCODING ,"");
                    curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);
                    $result = json_decode(curl_exec($handler), true);
                    $name = str_replace("'", "\\'", $result["name"]);
                    $image = $result["image"]["full"];

                    $champ = new Champion();
                    $champ->setIdRiot($id);
                    $champ->setName($name);
                    $champ->setImage($image);
                    $champ->setImageLoader($name . '_0.jpg');
                    $em->persist($champ);
                }
            }
        }
        $em->flush();

        $url = 'https://euw.api.pvp.net/api/lol/euw/v1.2/champion?freeToPlay=true&api_key=a285fc44-95aa-4b4e-9a9b-130dace287eb';
        $handler = curl_init($url);
        curl_setopt($handler, CURLOPT_ENCODING ,"");
        curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);
        $res = json_decode(curl_exec($handler), true);
        $tabChamp = array();
        for ($i = 0; $i < count($res["champions"]); $i++) {
            $champ = $this->getDoctrine()
                ->getRepository('RiotBundle:Champion')
                ->findOneBy(array('idRiot' => $res["champions"][$i]["id"]));
            $data = new FreeChampion();
            $data->setIdRiot($champ->getIdRiot());
            $data->setName($champ->getName());
            $data->setImage($champ->getImage());
            $data->setImageLoader($champ->getImageLoader());
            $em->persist($data);
        }
        $em->flush();
        return true;
    }

    public function redirectAction()
    {
        $view = $this->redirectView($this->generateUrl('some_route'), 301);
        // or
        $view = $this->routeRedirectView('some_route', array(), 301);

        return $this->handleView($view);
    }
}
