const mix = require('laravel-mix');

const domain = __dirname.split('/')[__dirname.split('/').length - 1] + '.test';
const homedir = require('os').homedir();

// The mix script:
mix.browserSync({
    proxy: `https://${domain}`,
    host: domain,
    open: 'external',
    https: {
        key: `${homedir}/.config/valet/Certificates/${domain}.key`,
        cert: `${homedir}/.config/valet/Certificates/${domain}.crt`
    },
    notify: true, //Enable or disable notifications
})

mix.js('resources/js/app.js', 'public/js')
    .postCss("resources/css/app.css", "public/css", [
        require("tailwindcss"),
    ])
    .disableSuccessNotifications()
    .version();
