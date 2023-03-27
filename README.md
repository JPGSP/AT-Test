# AT-Test

This project will show you a form where you can search by title inside product's data by a third party provider.

## System requirements

 - PHP 8.1 or above.
 - Symfony CLI.
 - Git.
 - Composer.
 - Docker.
 
## Download the source code:

Go to the folder where you have all your projects:

```bash
cd /path/to/projects/folder/
```

Then clone the Git Repository:

```bash
git clone https://github.com/JPGSP/AT-Test.git
```

Once the previous process has finished a new folder ```at-test``` will be created.

## Usage

- Docker

Go to your project folder:

```bash
cd /path/to/projects/folder/at-test
```

Write the following command:

```bash
make up
```

- No Docker.

Go to your project folder:

```bash
cd /path/to/projects/folder/at-test
```

Write the following command:

```bash
composer install
```

Once the previous command is finished
```bash
symfony serve -d
```

(!) Careful

If you play to much with the two previous options (symfony and/or docker version), it can happen that there is a port's conflict.
To fix this issue, you will need to use the following command:
```bash
lsof -P | grep ':8000' | awk '{print $2}'
```

- Run the project.

When the installation of the project is done, you can go to your browser (http://localhost:8000/ or http://127.0.0.1:8000/)
to search the products by title.



<img width="1133" alt="Screenshot 2023-03-27 at 01 14 42" src="https://user-images.githubusercontent.com/31289182/227813976-0ca8afd5-a271-4711-a83a-d6806e951a38.png">


## Next?

- Flexibility on the search

The state of the form is very limited. At the moment you can only search for products which are based in UK.
It does not matter the number of times you search for the same item, you will always will have the same results and the same number (10).

The products API gives you the possibility to search in different locations, establish a different limit of items you want to get, pagination. ....

All this features could be easily done, extending the search form.

- Refactor

HomeController should be SearchController

The Repository folder can be renamed to service (?)

- Installation / use of behat
