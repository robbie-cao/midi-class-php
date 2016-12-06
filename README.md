# MIDI CLASS

## Description

Class for reading, writing, analyzing, modifying, creating, downloading and playing (embedding) standard MIDI files (*.mid, *.rmi) of type 0 or 1. MIDI songs are internally represented as lists of tracks, where each track is a list of messages, and each message is a string. The message string format is the same as the one used by the commandline tools [MF2T/T2MF](ftp://ftp.cs.ruu.nl/pub/MIDI/PROGRAMS/MSDOS/mf2t.zip) created by Piet van Oostrum.

The class provides methods to generate and manipulate MIDI data and to import and export binary midi files (SMF, *.mid), text in the MF2T/T2MF format and [MIDI XML](http://www.recordare.com/dtds/midixml.html).

## Applications

- audio toys
- mixers
- sequencers
- ringtone creators
- musical education/training
- ...

## [Documentation](documentation.htm)

## Demos

[manipulate.php](manipulate.php)

demonstrates manipulation of MIDI data (imported MIDI file) in various ways

[sequencer.php](sequencer.php)

little online sequencer, 4 drum tracks, 4 instrument tracks, 1 bar only, result can be saved (simple mix format: serialized post array). 

[mid2txt.php](mid2txt.php)

demonstrates binary MIDI file to text (MF2T/T2MF format) conversion

[txt2mid.php](txt2mid.php)

demonstrates text (MF2T/T2MF format) to binary MIDI file conversion

[mid2xml.php](mid2xml.php)

demonstrates binary MIDI file to MIDI XML conversion

[xml2mid.php](xml2mid.php)

demonstrates MIDI XML to binary MIDI file conversion

[meta.php](meta.php)

shows content of all meta events in the first track of a MIDI file. These events are often used for song title, copyright informations etc. (like ID3 tags in mp3 files). 

[duration.php](duration.php)

demonstrates how to find the duration of a MIDI file.

[convert.php](convert.php)

converts MIDI files of type 1 to type 0.

[mid2rttl.php](mid2rttl.php)

demonstrates (simple) binary MIDI file to RTTL ringtone conversion (uses the RTTL extension, see downloads).

[rttl2mid.php](rttl2mid.php)

demonstrates RTTL ringtone to binary MIDI file conversion (uses the RTTL extension, see downloads).

## [Downloads](https://www.phpclasses.org/browse/package/1362/download/zip.html)

## Related Links

- <a href="http://www.midi.org/">MIDI Manufacturers Association (MMA)</a>
- <a href="http://www.midi.org/dtds/midi_xml.shtml">MMA's MIDI XML Specifications</a>
- <a href="http://www.recordare.com/default.asp">Recordare</a>
- <a href="http://www.recordare.com/dtds/midixml.html">Standard MIDI File DTD: MIDI XML</a>
- <a href="ftp://ftp.cs.ruu.nl/pub/MIDI/PROGRAMS/MSDOS/mf2t.zip">MF2T/T2MF</a>
- <a href="http://www.midiox.com/">MIDI-OX</a>
- <a href="http://www.beatnik.com/">Beatnik</a>

## [Online Tools](http://flashmusicgames.com/midi/)

- <a href="http://flashmusicgames.com/midi/mid2txt.php"><b>midi</b> to txt converter</a> - Binary <b>midi</b> file to text (MF2T/T2MF format) conversion
- <a href="http://flashmusicgames.com/midi/txt2mid.php">txt to <b>midi</b> converter</a> - Text (MF2T/T2MF format) to binary <b>midi</b> file conversion
- <a href="http://flashmusicgames.com/midi/mid2xml.php"><b>midi</b> to xml converter</a> - Binary <b>midi</b> file to <b>midi</b> XML conversion
- <a href="http://flashmusicgames.com/midi/xml2mid.php">xml to <b>midi</b>  converter</a> - <b>midi</b> XML to binary <b>midi</b> file conversion
- <a href="http://flashmusicgames.com/midi/mid2rttl.php"><b>midi</b> to rttl converter</a> - Simple binary <b>midi</b> file to RTTL ringtone conversion
- <a href="http://flashmusicgames.com/midi/rttl2mid.php">rttl to <b>midi</b> converter</a> - RTTL ringtone to binary <b>midi</b> file conversion

## Contact

[fluxus@freenet.de](fluxus@freenet.de)

