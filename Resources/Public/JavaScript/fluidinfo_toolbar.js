/***************************************************************
 *  Copyright notice
*
*  (c) 2013 hmmh Team TYPO3 <typo3@hmmh.de>, hmmh multimediahaus AG
*
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 3 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

/**
 * class to handle the fluid info menu
 */
var FluidInfoMenu = Class.create({

	initialize: function() {

		Ext.onReady(function() {
			var toolbarItem = $$('#tx-fluidinfo-toolbar a.toolbar-item')[0];
			var toolbarItemIcon = $$('#tx-fluidinfo-toolbar a.toolbar-item img')[0];

			var spinner = new Element('span').addClassName('spinner');

			toolbarItem.onclick = function(event) {
				if (toolbarItem.href) {
					var oldIcon = toolbarItemIcon.replace(spinner);
					var call = new Ajax.Request(toolbarItem.href, {
						'method': 'get',
						'onComplete': function(result) {
							if (toolbarItem.hasClassName('on')) {
								toolbarItem.removeClassName('on').addClassName('off');
								toolbarItemIcon.src = '../typo3conf/ext/fluid_info/Resources/Public/Icons/toolbar_off.png'
							} else {
								toolbarItem.removeClassName('off').addClassName('on');
								toolbarItemIcon.src = '../typo3conf/ext/fluid_info/Resources/Public/Icons/toolbar_on.png'
							}
							spinner.replace(oldIcon);
						}.bind(this)
					});
				}
				return false;
			};
		}, this);
	},

});

var TYPO3BackendFluidInfoMenu = new FluidInfoMenu();