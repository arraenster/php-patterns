let path = require('path');

let aliases = {
    'Assets': path.resolve('./assets'),
    'Home': path.resolve('.'),
    'NodeModules': path.resolve('./node_modules')
};

module.exports = aliases;