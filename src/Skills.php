<?php

namespace Malte;

class Skills
{
    protected $list = ['QF-Test', 'Oberflächentests', 'Symfony', 'Silex', 'Wordpress', 'Composer', 'PHP', 'PHP 7.2', 'MySQL', 'Java', 'Jenkins', 'Radfahren', 'Radverkehrspolitik', 'Bürgerbeteiligung', 'Critical Mass', 'Fotografie', 'Informatik', 'Medieninformatik', 'Computergrafik', 'Plesk', 'HTML5', 'CSS3', 'Linux', 'Apache', 'nginx', 'Adobe Photoshop', 'Journalismus', 'Testlink', 'Selenium', 'JBehave', 'SonarQube', 'jQuery', 'Cucumber', 'JavaScript', 'Jira', 'Confluence', 'git', 'Geolocation', 'OpenStreetMap', 'Bootstrap', 'Leaflet', 'NodeJs', 'Express.js', 'SCSS', 'GitLab', 'GitHub', 'Verkehrsrecht', 'Elasticsearch', 'Microservices', 'REST', 'Softwarearchitektur', 'Continuous Deployment', 'Objektorientierte Programmierung'];

    public function __construct()
    {
        $this
            ->sort()
            ->unique()
        ;
    }

    protected function sort(): Skills
    {
        natcasesort($this->list);

        return $this;
    }

    protected function unique(): Skills
    {
        $this->list = array_unique($this->list);

        return $this;
    }

    public function getList(): array
    {
        return $this->list;
    }

    public function __toString()
    {
        return join(', ', $this->list);
    }
}