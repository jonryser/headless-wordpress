# Initial Local Setup

***Ensure the [requirements](./README.md#requirements) are installed locally.***

1) Open Local, click on the plus sign (+) in the bottom left corner.

1) Select "Create a new site".

1) Press "Continue" in the bottom right corner.

1) Expand the "Advanced options".

1) Enter a name (ie "MyApp CMS") as the site name.

1) (Optional) Update the local domain (like "cms.myapp.local").

1) (Optional) Update the location for the app (like `/Users/me/projects/myapp-cms`).

1) Press "Continue" in the bottom right corner.

1) Select "Custom".

1) Select php version 8.1.X

1) Select Apache as the web server.

1) Select MySQL version 8.0.x

1) Press "Continue" in the bottom right corner.

1) Enter a Wordpress username (keep track of this).

1) Enter a Wordpress password (keep track of this).

1) Enter an email address to use with the Wordpress installation (keep track of this).

1) Press "Add Site" in the bottom right corner.

Local should create a generic site with a MySQL database.
The code will be located in the location defined in step 7 above (or the default `~/Local Sites/myapp-cms`).
The folder structure in the site folder will be like:

```txt
myapp-cms
├── app
│   └── public // Wordpress files
├── conf
└── logs
``````

In a terminal:

1) Navigate to the `public` folder that holds the Wordpress files.

1) From within the `public` folder remove the `wp-content` folder and all of its content.

    ```sh
    rm -rf wp-content
    ```

1) Clone this repo into `wp-content` (replace `my_org` and `my_healess_wordpress_repo_name`).

    ```sh
    git clone git@github.com:my_org/my_healess_wordpress_repo_name.git wp-content
    ```

1) Open the VS Code workspace file (`hw.code-workspace`) located inside the cloned repo.

1) Go to extensions and search for `@recommended`.

1) Install recommended extensions.

    *Pro tip*:

    When installing extensions ins VS Code, you can install, then disable the extension.
    This makes the extension available, but disabled globally.
    Then, click on the "gear" next to the extension and select "Enable (Workspace)".
    This will make the extension enabled only in this workspace and not interfere with other projects.

## Linting

1) Clone Wordpress Coding Standards (<https://github.com/WordPress/WordPress-Coding-Standards/tree/main>) in a location outside of the project.

1) Create an environment variable called `WCS_PATH` with the value of the path to the WordPress-Coding-Standards repo.

    ```sh
    # For Bash
    echo 'export WCS_PATH=/path/to/WordPress-Coding-Standards' >> ~/.bashrc

    # For Zsh
    echo 'export WCS_PATH=/path/to/WordPress-Coding-Standards' >> ~/.zshrc
    ```

1) Source the rule configuration file.

    ```sh
    # For Bash
    source ~/.bashrc

    # For Zsh
    source ~/.zshrc
    ```

1) For convenience, symlink `phpcs` to `usr/local/bin`

    ```sh
    sudo ln -s $WCS_PATH/vendor/squizlabs/php_codesniffer/bin/phpcs /usr/local/bin/phpcs
    ```

1) Configure `phpcs` (PHP Code Sniffer) to use the WordPress Coding Standards sniffs

    ```sh
    phpcs --config-set installed_paths $WCS_PATH
    ```

1) Set the WordPress rules to be the default global rules that `phpcs` uses.

    ```sh
    phpcs --config-set default_standard WordPress
    ```

The app is now ready for development.
