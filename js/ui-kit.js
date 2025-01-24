jQuery(function($){

  const cssVars = getAllCSSVariableNames();

  const rootVars = getElementCSSVariables(cssVars, document.documentElement);

  const colorVars = {};

  const fontSizeVars = {};

  // Filter colors and fontSize vars from rootVars
  for (let key in rootVars) {
    if (key.startsWith("--clr")) {
      colorVars[key] = rootVars[key];
    }
    if (key.startsWith("--fs")) {
      fontSizeVars[key] = rootVars[key];
    }
  }

  /*
   * Generate Colors Ui-Kit
   */
  const $colorsContainer = $('.js-ui-kit-colors');
  let colorsHTML = '';

  for (let key in colorVars) {
    const bgClass = key.replace('--clr', 'bg');
    const colorName = key.replace('--clr-', '');

    colorsHTML += `
      <div class="ui-color-box">
        <div class="ui-color-box__color | ${bgClass}">
        </div>
        <div class="ui-color-box__name">
          ${colorName}
        </div>
      </div>
    `;
  }
  $colorsContainer.html(colorsHTML);

  /*
   * Generate Typography Ui-Kit
   */
  const $fontSizesContainer = $('.js-ui-kit-font-sizes');
  let fontSizesHTML = '';

  for (let key in fontSizeVars) {
    const fsClass = key.replace('--fs', 'fs');

    fontSizesHTML += `
      <p class="${fsClass}">
        ${fsClass}
      </p>
    `;
  }
  $fontSizesContainer.html(fontSizesHTML);
});


function getAllCSSVariableNames(styleSheets = document.styleSheets){
 let cssVars = [];

 for(let i = 0; i < styleSheets.length; i++){
    try{ // try/catch used because 'hasOwnProperty' doesn't work
      for( let j = 0; j < styleSheets[i].cssRules.length; j++){
        try{
          for(let k = 0; k < styleSheets[i].cssRules[j].style.length; k++){
            let name = styleSheets[i].cssRules[j].style[k];

            if(name.startsWith('--') && cssVars.indexOf(name) == -1){
               cssVars.push(name);
            }
          }
        } catch (error) {}
      }
    } catch (error) {}
 }
 return cssVars;
}

function getElementCSSVariables (allCSSVars, element = document.body, pseudo){
   var elStyles = window.getComputedStyle(element, pseudo);
   var cssVars = {};
   for(var i = 0; i < allCSSVars.length; i++){
      let key = allCSSVars[i];
      let value = elStyles.getPropertyValue(key)
      if(value){cssVars[key] = value;}
   }
   return cssVars;
}

