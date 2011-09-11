# ZF2 MVC + Modules Prototype Tutorial
Written by [Evan Coury](http://evan.pro/)

## Introduction

Basically this is a mini tutorial where you'll start with my [zf2-sandbox](https://github.com/EvanDotPro/zf2-sandbox) project, which is a basic hello world app, similar to [Matthew's zf-quickstart](https://github.com/weierophinney/zf-quickstart)

The initial zf2-sandbox project has 2 modules pre-installed:

* **[Application](https://github.com/EvanDotPro/zf2-sandbox/tree/master/modules/Application)** - The "main" application, defines bootstrap, default route, index controller/view, etc.
* **[Sample](https://github.com/EvanDotPro/zf2-sandbox/tree/master/modules/Sample)** - This is actually just a vanilla, bare-bones module skeleton that simply provides one controller/action/view; I just threw it in there to illustrate the difference between the "main" application module and how minimal any subsequent modules can be. The sample module is largely irrelevant to this little guide, but feel free to poke around in it.

Once we have the the initial sandbox running, we're going to install some more modules! (I could have pre-installed the rest as well, but one of my goals is to help get people thinking about stuff such as the installation process, etc.)

The modules we're going to be installing are:

* **[User](https://github.com/EvanDotPro/zf2-user-module)** - A very simple user registration/authentication module I created. It provides bare bones controllers/actions/views/models/mappers/services to allow users to register and sign into a given site.
* **[Guestbook](https://github.com/EvanDotPro/zf2-guestbook-module)** - We'll also install Matthew's Guestbook module from his [zf-quickstart](https://github.com/weierophinney/zf-quickstart) project. I broke it off into a separate repo for easy of installation for this guide.

In all, you'll have 4 modules installed (technically 6 if you count [Zf2Mvc](https://github.com/EvanDotPro/zf2/tree/prototype/mvc-module/modules/Zf2Mvc) and [Zf2Module](https://github.com/EvanDotPro/zf2/tree/prototype/mvc-module/modules/Zf2Module)) and a site that allows for user registration and authentication (via MySQL), as well as a functional guestbook (via SQLite)!

## Let's begin!

At the end of each phase, you should have a functional site with increasing levels of functionality (described at the end of each phase below).

### Phase 0: Set up a functional copy of my [zf2-sandbox](https://github.com/EvanDotPro/zf2-sandbox)  project:

0. `cd /path/to/vhosts` (wherever you keep your projects/vhosts)
1. `git clone --recursive git://github.com/EvanDotPro/zf2-sandbox.git`
2. `cd zf2-sandbox` (after this point, all paths are relative to this directory)
3. `cp configs/application.config.dist.php configs/application.config.php`
4. Set up a vhost for the sandbox pointing to the `public/` directory.

Navigate to http://your-vhost/ and you should now see the "Welcome to Evan's Zend Framework Sandbox Project!" page. Note that if you go to http://your-vhost/user, you'll get a page not found error at this point.

![Phase 0](http://www.evan.pro/caps/886b7a.png)

### Phase 1: Install the [User](https://github.com/EvanDotPro/zf2-user-module) module:
0. `git clone git://github.com/EvanDotPro/zf2-user-module.git modules/User`
1. Create a MySQL db and run the schema provided in `modules/User/data/schema.sql`
2. `cp modules/User/configs/config.development.dist.php modules/User/configs/config.development.php`
3. Set the database credentials in `modules/User/configs/config.development.php`
4. Finally add `User` to the modules array in `configs/application.config.php`

Navigate to http://your-vhost/user and you should be greeted with a Sign In page. You can click Sign Up at the bottom and create an account. After creating the account, you'll be redirected back to the Sign In page, and the email/password you just created should work.

![Phase 1](http://www.evan.pro/caps/cd2c2e.png)

### Phase 2: Install Matthew's [Guestbook](https://github.com/EvanDotPro/zf2-guestbook-module) module (I went ahead and set it up in a separate repo):
0. `git clone git://github.com/EvanDotPro/zf2-guestbook-module.git modules/Guestbook`
1. Add `Guestbook` to the modules array in `configs/application.config.php`

Navigate to http://your-vhost/guestbook and voilà, you have a guestbook!

![Phase 2](http://www.evan.pro/caps/a2baa1.png)

## Conclusion
That concludes this tutorial. I did try this process my self, however I know everyone's environments are different, so let me know if you run into any issues with any of the steps here, and I'll be glad to help you through it.

In all, there's still plenty to do and figure out, and hopefully having these examples to work with will help foster some great ideas and solutions. Here's a rough compiled list of some of the aspects of modules that are still looking for answers (there are quite a few ideas and suggestions already floating around on the zf-contributors mailing list, so please check there and join the conversation!):

* **Overall**
    * How can modules cleanly "share" resources? For example, you have 5 module which all use a database connection (or maybe two: master for writes, slave  for reads).
    * How can modules use varying view templating types? For example, one module uses twig, another uses smarty, another mustache, and yet another uses phtml. Does it make sense to have modules for each template library or system, then modules can just decalre the respective one as a dependency?
* **Installation**
    * Importing DB Schema
    * "Merging/compiling" of config (routes, di config, etc) to save cycles at runtime.
    * Making static assets publically available
    * Resolving dependencies
* **Upgrades**
    * DB migrations
    * Replacement of assets, merged config values (routes, di, etc)
    * How to handle (or not handle) if assets/config values have been changed/modified?
* **Uninstallation**
    * What's removed, what should stay?
    * Removal of "merged/compiled-in" config values. How to tell if a config value has been overridden / changed by another module? What to do then?
    * Should it check for other modules that are depending on it? How much is too much, and when do we just leave it up to the developers?
