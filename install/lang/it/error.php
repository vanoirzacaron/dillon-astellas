<?php
// This file is part of Moodle - https://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <https://www.gnu.org/licenses/>.

/**
 * Automatically generated strings for Moodle installer
 *
 * Do not edit this file manually! It contains just a subset of strings
 * needed during the very first steps of installation. This file was
 * generated automatically by export-installer.php (which is part of AMOS
 * {@link http://docs.moodle.org/dev/Languages/AMOS}) using the
 * list of strings defined in /install/stringnames.txt.
 *
 * @package   installer
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['cannotcreatedboninstall'] = '<p>Non è possibile creare il database </p> <p>Il database non esiste e l\'utente fornito non è autorizzato a crearlo.</p>
<p>È necessario che l\'amministratore del sito  verifichi  la configurazione del database.</p>';
$string['cannotcreatelangdir'] = 'Non è possibile creare la cartella lang';
$string['cannotcreatetempdir'] = 'Non è possibile creare la cartella temp';
$string['cannotdownloadcomponents'] = 'Non è possibile scaricare componenti.';
$string['cannotdownloadzipfile'] = 'Non è possibile scaricare file ZIP.';
$string['cannotfindcomponent'] = 'Non è possibile trovare il componente.';
$string['cannotsavemd5file'] = 'Non è possibile salvare il file md5';
$string['cannotsavezipfile'] = 'Non è possibile salvare il file ZIP';
$string['cannotunzipfile'] = 'Non è possibile decomprimere il file.';
$string['componentisuptodate'] = 'Il componente è aggiornato.';
$string['dmlexceptiononinstall'] = '<p>Si è verificato un errore nel database: [{$a->errorcode}].<br />{$a->debuginfo}</p>';
$string['downloadedfilecheckfailed'] = 'Il controllo del file scaricato non è andato a buon fine.';
$string['invalidmd5'] = 'La variabile di controllo era errata - prova di nuovo';
$string['missingrequiredfield'] = 'Mancano alcuni campi richiesti';
$string['remotedownloaderror'] = '<p>Lo scaricamento delle componenti non è andato a buon fine. Verificare le impostazioni del proxy. L\'estensione PHP cURL è fortemente consigliata.</p>
<p>Devi scaricare manualmente il file <a href="{$a->url}">{$a->url}</a>, copiarlo in "{$a->dest}" e decomprimerlo.</p>';
$string['wrongdestpath'] = 'Percorso di destinazione errato';
$string['wrongsourcebase'] = 'Indirizzo (URL) sorgente errato.';
$string['wrongzipfilename'] = 'Il nome del file ZIP è errato.';
