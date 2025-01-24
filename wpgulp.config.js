/*
 * Project Name and Local Server URL
 */
const projectName = "ywm"; // Name of your theme
const projectURL = "http://codelibry.local/"; // Your local server address

// Local project URL of your already running WordPress site.
// > Could be something like "wpgulp.local" or "localhost"
// > depending upon your local WordPress setup.


/*
 * Theme/Plugin URL. Leave it like it is; since our gulpfile.js lives in the root folder.
 */
const productURL = "./";
const browserAutoOpen = false;
const injectChanges = true;


/*
 * Styles Options
 */
const styleSRC = "./sass/main.sass"; // Path to main .sass file.
const styleDestination = "./dist/"; // Path to place the compiled CSS file. Default set to root folder.

const outputStyle = "compact"; // Available options → 'compact' or 'compressed' or 'nested' or 'expanded'
const errLogToConsole = true;
const precision = 10;


/*
 * JS Vendor options.
 */
const jsVendorSRC = "./js/vendor/**/*.js"; // Path to JS vendor folder.
const jsVendorDestination = "./dist/"; // Path to place the compiled JS vendors file.
const jsVendorFile = "vendor"; // Compiled JS vendors file name. Default set to vendors i.e. vendors.js.


/*
 * JS Custom options.
 */
const jsCustomSRC = "./js/**/*.js"; // Path to JS custom scripts folder.
const jsCustomDestination = "./dist/"; // Path to place the compiled JS custom scripts file.
const jsCustomFile = "main"; // Compiled JS custom file name. Default set to custom i.e. custom.js.


/*
 * Images options.
 */
// Source folder of images which should be optimized and watched.
// > You can also specify types e.g. raw/**.{png,jpg,gif} in the glob.
const imgSRC = "./assets/images/raw/**/*";

// Destination folder of optimized images.
// > Must be different from the imagesSRC folder.
const imgDST = "./assets/images/";


/*
 * Watch Files Paths
 */
const watchStyles = "./sass/**/*.{sass,scss}"; // Path to all *.sass *.scss files
const watchJsVendor = "./js/vendor/**/*.js"; // Path to all vendor JS files.
const watchJsCustom = "./js/**/*.js"; // Path to all custom JS files.
const watchPhp = "./**/*.php"; // Path to all PHP files.


/*
 * Zip File config
 */
const zipName = `${projectName}.zip`; // Must have.zip at the end.
const zipDestination = "./../"; // Default: Parent folder.
const zipIncludeGlob = ["./**/*"]; // Default: Include all files/folders in current directory.

// Default ignored files and folders for the zip file.
const zipIgnoreGlob = [
	"!./{node_modules,node_modules/**/*}",
	"!./.git",
	"!./.svn",
	"!./gulpfile.babel.js",
	"!./wpgulp.config.js",
	"!./.eslintrc.js",
	"!./.eslintignore",
	"!./.editorconfig",
	"!./phpcs.xml.dist",
	"!./vscode",
	"!./package.json",
	"!./package-lock.json",
	"!./sass/**/*",
	"!./sass",
	"!./assets/images/raw/**/*",
	"!./assets/images/raw",
	`!${imgSRC}`,
	`!${styleSRC}`,
	`!${jsCustomSRC}`,
	`!${jsVendorSRC}`,
];

// >>>>> Translation options.
// Your text domain here.
const textDomain = projectName;

// Name of the translation file.
const translationFile = `${projectName}.pot`;

// Where to save the translation files.
const translationDestination = "./languages";

// Package name.
const packageName = projectName;

// Where can users report bugs.
const bugReport = "";

// Last translator Email ID.
const lastTranslator = "";

// Team's Email ID.
const team = "";

// Browsers you care about for auto-prefixing. Browserlist https://github.com/ai/browserslist
// The following list is set as per WordPress requirements. Though; Feel free to change.
const BROWSERS_LIST = ["last 2 version", "> 1%"];

// Export.
module.exports = {
	projectURL,
	productURL,
	browserAutoOpen,
	injectChanges,
	styleSRC,
	styleDestination,
	outputStyle,
	errLogToConsole,
	precision,
	jsVendorSRC,
	jsVendorDestination,
	jsVendorFile,
	jsCustomSRC,
	jsCustomDestination,
	jsCustomFile,
	imgSRC,
	imgDST,
	watchStyles,
	watchJsVendor,
	watchJsCustom,
	watchPhp,
	zipName,
	zipDestination,
	zipIncludeGlob,
	zipIgnoreGlob,
	textDomain,
	translationFile,
	translationDestination,
	packageName,
	bugReport,
	lastTranslator,
	team,
	BROWSERS_LIST,
};
