# Onubadok: A localisation tool for laravel projects
## Localize your laravel project with ease using onubadok.

### Installation
```
composer require robinncode/ci_onubadok
```

### Usage
- To generate language files run the following command
    ```
    php spark onubadok:generate your_language_code
    ```
    #### Example
    ```
    php spark onubadok:generate bn
    ```
    This will generate a necessary files on as `app/Language/en` and `app/Language/bn`. Now you can translate the file and save it.
    
- To publish the Controller file run the following command
    ```
    php spark onubadok:publish
    ```
    This will publish the controller file to `app/Controllers/OnubadokController.php`. Now you can use the controller to get the translated text.
    Also append the following line to your `app/Config/Routes.php` file
    ```
    $routes->get('onubadok/change/{lang}', 'OnubadokController::change/$1');
    ```
  
### Using in views file
Now run your project then goto your browser and type `http://your_project_url/onubadok/change/your_language_code` to change the language to `your_language_code`. Now you can use the following code to get the translated text.
```
<?= lang('your_key') ?>
```
#### Example
Here is an example of a data table column name. Here `data_table` is the file name and `Name` is the key.
```
<?= lang('data_table.Name') ?>
```

### License
This package is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

### Contribution
Feel free to contribute to this project. Any kind of contribution is welcome.

### Author
MsM Robin <msmrobin518@gmail.com>
