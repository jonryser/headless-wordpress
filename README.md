# Headless Wordpress

This is a headless Wordpress starter repo.
This will not generate a fronend.
You will need to create a separate frontend application.
The frontend will use the GraphQL endpoints to query from the headless Wordpress.
A Nextjs starter frontend that works with this is <https://github.com/jonryser/nextjs-for-headless-wordpress>.

## Requirements

- [php](https://www.php.net/manual/en/install.php) - Needed locally for linting

- [composer](https://getcomposer.org/download/) - Needed locally for linting

- [Local](https://localwp.com/) - For local wordpress development

## Initial Local Setup

See [INITIAL.md](./INITIAL.md)

## Development

Open Local and navigate to your site under "Local sites".
Ensure the site is running.
If it is running, there with be a red "Stop site" in the upper right corner of the app.
If it is not running, click the green "Start site in the upper right corner.

Once the site is running, click on either the green "WP Admin" or "Open site" buttons.
They both do the same thing; they will open the Wordpress admin console in the browser.

Authenticate and enter the console.
Use the "GraphiQL IDE" to test queries.

### Linting

To lint the project, from within the wp-content folder, run

```sh
phpcs ./themes
```

To fix some linting issues automatically, right click on the open php file and select "Format Document".

## Contributing

I so welcome contributions to making this better! Please create a fork and commit your changes to the fork. Then make a PR from the fork to this repo's "develop" branch.

I will code review. Once changes are accepted, it can be merged into develop and then on to the main branch.
