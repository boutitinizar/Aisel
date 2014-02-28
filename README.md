About
========================

Aisel is young open source project based on combination Symfony2 with AngularJS for frontend, project started as experiment in january 2014.
Aisel still remains not finished, but has minimal list of features for quick-start.<br/>

Project website: http://aisel.co/<br/>
Sandbox frontend: http://sandbox.aisel.co/<br/>
Sandbox administration: http://sandbox.aisel.co/administration [backenduser/backenduser]

Installation
========================

1.) curl -sS https://getcomposer.org/installer | php<br/>
2.) php app/console doctrine:schema:create<br/>
3.) php app/console doctrine:fixtures:load<br/>
4.) php app/console cache:clear --env=dev<br/>
5.) bower install<br/>
Important: webserver need permissions to write in cache directory aisel/app/cache/<br/>

Once this steps is done you will be able to access admin section from http://websitename.dev/administration/
and frontend at http://websitename.dev/

