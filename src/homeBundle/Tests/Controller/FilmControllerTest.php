<?php

namespace homeBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class FilmControllerTest extends WebTestCase
{
    public function testCreateFilmIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/fr/films/');

        $crawler = $client->click($crawler->selectLink('Ajouter un film')->link());

        $form = $crawler->selectButton('Ajouter')->form();

        $form['form_film[nom]']                 = 'nameTest';
        $form['form_film[numVisa]']             = "1234";
        $form['form_film[duree]']               = "200";
        $form['form_film[noteSpectateur]']      = "4";
        $form['form_film[pays]']                = "France";
        $form['form_film[dateSortie][month]']   = "4";
        $form['form_film[dateSortie][day]']     = "26";
        $form['form_film[dateSortie][year]']    = "2015";
        $form['form_film[synopsis]']            = "résumé";
        $form['form_film[director]']            = "Lord LanyDrak";
        $form['form_film[genre]']               = "2";
        $form['form_film[acteurs]']             = "10";
        $form['form_film[budget]']              = "150000";
        $form['form_film[boxOfficeFrance]']     = "80000";
        $form['form_film[duree]']               = "100";
        $form['form_film[trailer]']            = "EkKBZ4w_w20";
        $form['form_film[file]']                = "/drakmovies/web/dist/img/uploads/affiches/running.jpg";


        $crawler = $client->submit($form);
        $crawler = $client->followRedirect();

        $this->assertEquals(1, $crawler->filter('html:contains("ajouté à la base")')->count());
    }
}