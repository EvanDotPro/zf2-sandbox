So the way this works is:

Application is the "main" application module. It provides the IndexController and / route.

The Application module's configuration declares that it requires the HelloWorld module.

The HelloWorld module provides the HelloController and /hello route.

The HelloWorld module's configuration declares that it requires the HelloWorldDep module.

The HelloWorldDep module provides the DepController and /dep route.
