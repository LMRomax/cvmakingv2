/*
 * Copyright (c) 2019. SpinForWIn. All rights reserved.
 * Deposit IDDN.FR.001.210001.000.S.P.2016.000.30000
 * Redistribution and use of this software, in source and binary forms, with or without modification, are not permitted.
 * In order to obtain a license for this software, you should contact : SpinForWin, 141 Avenue du Roy de Blicquy, 59154 Crespin, France.
 * This software is provided by the Copyright Holders "as is" and any express or implied warranties, including, but not limited to, the implied warranties of merchantability and fitness for a particular purpose are disclaimed.
 */

function openMenu() {
  var responsive = document.getElementsByClassName("responsive-mobile-drawer--west");
  var obfuscator = document.getElementsByClassName("responsive-overlay");
  responsive[0].classList.add("is-active");
  obfuscator[0].classList.add("is-active");
}

function closeMenu() {
  var responsive = document.getElementsByClassName("responsive-mobile-drawer--west");
  var obfuscator = document.getElementsByClassName("responsive-overlay");
  responsive[0].classList.remove("is-active");
  obfuscator[0].classList.remove("is-active");
}
