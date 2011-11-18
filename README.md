Evan's ZF2 Sandbox
==================
Version 0.1.0 Created by Evan Coury

Introduction
------------
This is just an area for me to mess around with ZF2 and try out various
concepts. You may use it for reference / learning, but please do not use
anything in this repository for anything close to production use. Everything
here is **very** unstable.

Installation
------------
This is the easiest way to get the fully functional project, including the proper 
version of ZF2:

    git clone --recursive git://github.com/EvanDotPro/zf2-sandbox.git

Next, copy `configs/conf.d/database.config.dist.php` to
`configs/conf.d/database.config.php` and edit it with your database credentials.

Now, import the schema in `docs/fullschema.sql`.

Try it out! Go to http://yourvhost/user and you should be greeted with a login
screen. Also you'll have a guestbook at http://yourvhost/guestbook.

The interesting thing is that the `EdpUser` module is using Doctrine2 by default,
while the `MwopGuestbook` module is using Zend\Db\Table, yet they are sharing a
single configured PDO instance. Cool, huh?

By the way, you can switch the `EdpUser` module to use Zend\Db instead by simply
uncommenting one line in `modules/Application/configs/di.config.php`.
