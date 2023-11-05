# Directory Class Reader

This is a project to facilitate the reading of PHP classes from a directory.

```
composer install lyzframework/directory-class-reader
```

#### It contains two classes for this purpose:

- <strong>ReaderFilesPHPDirectory</strong>: reads all PHP files from a directory recursively. Instantiate the class by passing the mandatory $directory parameter, and then call the getListFiles() method to retrieve the list of files.
  <br/><br/>
- <strong>ReaderClassDirectory</strong>: reads all files from a directory and retrieves the namespace so that you can instantiate the classes. Instantiate the class by passing the mandatory $readerFilesPHPDirectory parameter of type ReaderFilesPHPDirectory. After that, call the getListNamespace() method to retrieve an array with all the namespaces found.

A common use case is when you have a directory with several 
controllers that have routes mappings, and you want to retrieve 
all these controllers and perform a reflection treatment to 
extract the meta-information.