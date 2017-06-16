# laravel-artisan-global (1.0.0)

## Purpose
   To enable you to run 'artisan [command]' from any directory in a laravel project, without having to change to the top
   of the project's directory.

## Install
   composer **global** require ha17/laravel-artisan-global
   
   (important that this is global; it's the whole point. Otherwise, the normal artisan command works fine)

   Make sure the composer global bin in is your path by adding this to your ~/.bashrc or similar:

   if [ -e "$HOME/.composer/vendor/bin" ]; then
       export PATH="$PATH:$HOME/.composer/vendor/bin";
   fi

   

   
## Usage
   OLD: php artisan [command]
   
   NEW: artisan [command]
   
## Errors
   This command looks up the directory structure for 'artisan'. 
   
### If you are in the directory with 'artisan' it will work
    (/) /path/to/laravel-install/ # artisan [command]

### If you are in a directory under 'artisan' it will work. 
    (/) /path/to/laravel-install/app # artisan [command]
    (/) /path/to/laravel-install/storage # artisan [command]
    (/) /path/to/laravel-install/resources/views # artisan [command]
    ... etc

### If you are in a directory above 'artisan' it will not work. 
    (X) /path/to # artisan [command] (Nope!)

### If you have named other files 'artisan' (no extension), it might try to run it, instead. YMMV if you decide to do that.
    # ls -l /path/to/larvel-install/storage
    app artisan content framework logs (you added 'artisan' here)
    
    # /path/to/laravel-install/storage # artisan [command] (Nope: it's going to pick up on the file you added, not the real command)
