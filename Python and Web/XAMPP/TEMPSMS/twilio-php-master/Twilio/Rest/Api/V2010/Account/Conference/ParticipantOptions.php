<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Api\V2010\Account\Conference;

use Twilio\Options;
use Twilio\Values;

abstract class ParticipantOptions {
    /**
     * @param boolean $muted Indicates if the participant should be muted
     * @param boolean $hold Specifying true will hold the participant, while false
     *                      will un-hold.
     * @param string $holdUrl The 'HoldUrl' attribute lets you specify a URL for
     *                        music that plays when a participant is held.
     * @param string $holdMethod Specify GET or POST, defaults to GET
     * @param string $announceUrl The announce_url
     * @param string $announceMethod The announce_method
     * @return UpdateParticipantOptions Options builder
     */
    public static function update($muted = Values::NONE, $hold = Values::NONE, $holdUrl = Values::NONE, $holdMethod = Values::NONE, $announceUrl = Values::NONE, $announceMethod = Values::NONE) {
        return new UpdateParticipantOptions($muted, $hold, $holdUrl, $holdMethod, $announceUrl, $announceMethod);
    }

    /**
     * @param string $statusCallback absolute url
     * @param string $statusCallbackMethod GET, POST
     * @param string $statusCallbackEvent initiated, ringing, answered, completed
     * @param integer $timeout 5-600
     * @param boolean $record true, false
     * @param boolean $muted true, false
     * @param string $beep true, false, onEnter, onExit
     * @param boolean $startConferenceOnEnter true, false
     * @param boolean $endConferenceOnExit true, false
     * @param string $waitUrl absolute url
     * @param string $waitMethod GET, POST
     * @param boolean $earlyMedia true, false
     * @param integer $maxParticipants 2-10
     * @param string $conferenceRecord true, false, record-from-start, do-not-record
     * @param string $conferenceTrim trim-silence or do-not-trim
     * @param string $conferenceStatusCallback absolute url
     * @param string $conferenceStatusCallbackMethod GET, POST
     * @param string $conferenceStatusCallbackEvent start end join leave mute hold
     *                                              speaker
     * @param string $recordingChannels mono, dual
     * @param string $recordingStatusCallback absolute url
     * @param string $recordingStatusCallbackMethod GET, POST
     * @param string $sipAuthUsername sip username
     * @param string $sipAuthPassword sip password
     * @param string $region us1, ie1, de1, sg1, br1, au1, jp1
     * @param string $conferenceRecordingStatusCallback absolute url
     * @param string $conferenceRecordingStatusCallbackMethod GET, POST
     * @param string $recordingStatusCallbackEvent The
     *                                             recording_status_callback_event
     * @param string $conferenceRecordingStatusCallbackEvent The
     *                                                       conference_recording_status_callback_event
     * @return CreateParticipantOptions Options builder
     */
    public static function create($statusCallback = Values::NONE, $statusCallbackMethod = Values::NONE, $statusCallbackEvent = Values::NONE, $timeout = Values::NONE, $record = Values::NONE, $muted = Values::NONE, $beep = Values::NONE, $startConferenceOnEnter = Values::NONE, $endConferenceOnExit = Values::NONE, $waitUrl = Values::NONE, $waitMethod = Values::NONE, $earlyMedia = Values::NONE, $maxParticipants = Values::NONE, $conferenceRecord = Values::NONE, $conferenceTrim = Values::NONE, $conferenceStatusCallback = Values::NONE, $conferenceStatusCallbackMethod = Values::NONE, $conferenceStatusCallbackEvent = Values::NONE, $recordingChannels = Values::NONE, $recordingStatusCallback = Values::NONE, $recordingStatusCallbackMethod = Values::NONE, $sipAuthUsername = Values::NONE, $sipAuthPassword = Values::NONE, $region = Values::NONE, $conferenceRecordingStatusCallback = Values::NONE, $conferenceRecordingStatusCallbackMethod = Values::NONE, $recordingStatusCallbackEvent = Values::NONE, $conferenceRecordingStatusCallbackEvent = Values::NONE) {
        return new CreateParticipantOptions($statusCallback, $statusCallbackMethod, $statusCallbackEvent, $timeout, $record, $muted, $beep, $startConferenceOnEnter, $endConferenceOnExit, $waitUrl, $waitMethod, $earlyMedia, $maxParticipants, $conferenceRecord, $conferenceTrim, $conferenceStatusCallback, $conferenceStatusCallbackMethod, $conferenceStatusCallbackEvent, $recordingChannels, $recordingStatusCallback, $recordingStatusCallbackMethod, $sipAuthUsername, $sipAuthPassword, $region, $conferenceRecordingStatusCallback, $conferenceRecordingStatusCallbackMethod, $recordingStatusCallbackEvent, $conferenceRecordingStatusCallbackEvent);
    }

    /**
     * @param boolean $muted Filter by muted participants
     * @param boolean $hold Only show participants that are held or unheld.
     * @return ReadParticipantOptions Options builder
     */
    public static function read($muted = Values::NONE, $hold = Values::NONE) {
        return new ReadParticipantOptions($muted, $hold);
    }
}

class UpdateParticipantOptions extends Options {
    /**
     * @param boolean $muted Indicates if the participant should be muted
     * @param boolean $hold Specifying true will hold the participant, while false
     *                      will un-hold.
     * @param string $holdUrl The 'HoldUrl' attribute lets you specify a URL for
     *                        music that plays when a participant is held.
     * @param string $holdMethod Specify GET or POST, defaults to GET
     * @param string $announceUrl The announce_url
     * @param string $announceMethod The announce_method
     */
    public function __construct($muted = Values::NONE, $hold = Values::NONE, $holdUrl = Values::NONE, $holdMethod = Values::NONE, $announceUrl = Values::NONE, $announceMethod = Values::NONE) {
        $this->options['muted'] = $muted;
        $this->options['hold'] = $hold;
        $this->options['holdUrl'] = $holdUrl;
        $this->options['holdMethod'] = $holdMethod;
        $this->options['announceUrl'] = $announceUrl;
        $this->options['announceMethod'] = $announceMethod;
    }

    /**
     * Specifying `true` will mute the participant, while `false` will un-mute. Anything other than `true` or `false` is interpreted as `false`.
     * 
     * @param boolean $muted Indicates if the participant should be muted
     * @return $this Fluent Builder
     */
    public function setMuted($muted) {
        $this->options['muted'] = $muted;
        return $this;
    }

    /**
     * Specifying `true` will hold the participant, while `false` will un-hold.
     * 
     * @param boolean $hold Specifying true will hold the participant, while false
     *                      will un-hold.
     * @return $this Fluent Builder
     */
    public function setHold($hold) {
        $this->options['hold'] = $hold;
        return $this;
    }

    /**
     * The 'HoldUrl' attribute lets you specify a URL for music that plays when a participant is held. The URL may be an MP3, a WAV or a TwiML document that uses &lt;Play&gt; &lt;Say&gt; or &lt;Redirect&gt;.
     * 
     * @param string $holdUrl The 'HoldUrl' attribute lets you specify a URL for
     *                        music that plays when a participant is held.
     * @return $this Fluent Builder
     */
    public function setHoldUrl($holdUrl) {
        $this->options['holdUrl'] = $holdUrl;
        return $this;
    }

    /**
     * Specify GET or POST, defaults to GET
     * 
     * @param string $holdMethod Specify GET or POST, defaults to GET
     * @return $this Fluent Builder
     */
    public function setHoldMethod($holdMethod) {
        $this->options['holdMethod'] = $holdMethod;
        return $this;
    }

    /**
     * The announce_url
     * 
     * @param string $announceUrl The announce_url
     * @return $this Fluent Builder
     */
    public function setAnnounceUrl($announceUrl) {
        $this->options['announceUrl'] = $announceUrl;
        return $this;
    }

    /**
     * The announce_method
     * 
     * @param string $announceMethod The announce_method
     * @return $this Fluent Builder
     */
    public function setAnnounceMethod($announceMethod) {
        $this->options['announceMethod'] = $announceMethod;
        return $this;
    }

    /**
     * Provide a friendly representation
     * 
     * @return string Machine friendly representation
     */
    public function __toString() {
        $options = array();
        foreach ($this->options as $key => $value) {
            if ($value != Values::NONE) {
                $options[] = "$key=$value";
            }
        }
        return '[Twilio.Api.V2010.UpdateParticipantOptions ' . implode(' ', $options) . ']';
    }
}

class CreateParticipantOptions extends Options {
    /**
     * @param string $statusCallback absolute url
     * @param string $statusCallbackMethod GET, POST
     * @param string $statusCallbackEvent initiated, ringing, answered, completed
     * @param integer $timeout 5-600
     * @param boolean $record true, false
     * @param boolean $muted true, false
     * @param string $beep true, false, onEnter, onExit
     * @param boolean $startConferenceOnEnter true, false
     * @param boolean $endConferenceOnExit true, false
     * @param string $waitUrl absolute url
     * @param string $waitMethod GET, POST
     * @param boolean $earlyMedia true, false
     * @param integer $maxParticipants 2-10
     * @param string $conferenceRecord true, false, record-from-start, do-not-record
     * @param string $conferenceTrim trim-silence or do-not-trim
     * @param string $conferenceStatusCallback absolute url
     * @param string $conferenceStatusCallbackMethod GET, POST
     * @param string $conferenceStatusCallbackEvent start end join leave mute hold
     *                                              speaker
     * @param string $recordingChannels mono, dual
     * @param string $recordingStatusCallback absolute url
     * @param string $recordingStatusCallbackMethod GET, POST
     * @param string $sipAuthUsername sip username
     * @param string $sipAuthPassword sip password
     * @param string $region us1, ie1, de1, sg1, br1, au1, jp1
     * @param string $conferenceRecordingStatusCallback absolute url
     * @param string $conferenceRecordingStatusCallbackMethod GET, POST
     * @param string $recordingStatusCallbackEvent The
     *                                             recording_status_callback_event
     * @param string $conferenceRecordingStatusCallbackEvent The
     *                                                       conference_recording_status_callback_event
     */
    public function __construct($statusCallback = Values::NONE, $statusCallbackMethod = Values::NONE, $statusCallbackEvent = Values::NONE, $timeout = Values::NONE, $record = Values::NONE, $muted = Values::NONE, $beep = Values::NONE, $startConferenceOnEnter = Values::NONE, $endConferenceOnExit = Values::NONE, $waitUrl = Values::NONE, $waitMethod = Values::NONE, $earlyMedia = Values::NONE, $maxParticipants = Values::NONE, $conferenceRecord = Values::NONE, $conferenceTrim = Values::NONE, $conferenceStatusCallback = Values::NONE, $conferenceStatusCallbackMethod = Values::NONE, $conferenceStatusCallbackEvent = Values::NONE, $recordingChannels = Values::NONE, $recordingStatusCallback = Values::NONE, $recordingStatusCallbackMethod = Values::NONE, $sipAuthUsername = Values::NONE, $sipAuthPassword = Values::NONE, $region = Values::NONE, $conferenceRecordingStatusCallback = Values::NONE, $conferenceRecordingStatusCallbackMethod = Values::NONE, $recordingStatusCallbackEvent = Values::NONE, $conferenceRecordingStatusCallbackEvent = Values::NONE) {
        $this->options['statusCallback'] = $statusCallback;
        $this->options['statusCallbackMethod'] = $statusCallbackMethod;
        $this->options['statusCallbackEvent'] = $statusCallbackEvent;
        $this->options['timeout'] = $timeout;
        $this->options['record'] = $record;
        $this->options['muted'] = $muted;
        $this->options['beep'] = $beep;
        $this->options['startConferenceOnEnter'] = $startConferenceOnEnter;
        $this->options['endConferenceOnExit'] = $endConferenceOnExit;
        $this->options['waitUrl'] = $waitUrl;
        $this->options['waitMethod'] = $waitMethod;
        $this->options['earlyMedia'] = $earlyMedia;
        $this->options['maxParticipants'] = $maxParticipants;
        $this->options['conferenceRecord'] = $conferenceRecord;
        $this->options['conferenceTrim'] = $conferenceTrim;
        $this->options['conferenceStatusCallback'] = $conferenceStatusCallback;
        $this->options['conferenceStatusCallbackMethod'] = $conferenceStatusCallbackMethod;
        $this->options['conferenceStatusCallbackEvent'] = $conferenceStatusCallbackEvent;
        $this->options['recordingChannels'] = $recordingChannels;
        $this->options['recordingStatusCallback'] = $recordingStatusCallback;
        $this->options['recordingStatusCallbackMethod'] = $recordingStatusCallbackMethod;
        $this->options['sipAuthUsername'] = $sipAuthUsername;
        $this->options['sipAuthPassword'] = $sipAuthPassword;
        $this->options['region'] = $region;
        $this->options['conferenceRecordingStatusCallback'] = $conferenceRecordingStatusCallback;
        $this->options['conferenceRecordingStatusCallbackMethod'] = $conferenceRecordingStatusCallbackMethod;
        $this->options['recordingStatusCallbackEvent'] = $recordingStatusCallbackEvent;
        $this->options['conferenceRecordingStatusCallbackEvent'] = $conferenceRecordingStatusCallbackEvent;
    }

    /**
     * absolute url
     * 
     * @param string $statusCallback absolute url
     * @return $this Fluent Builder
     */
    public function setStatusCallback($statusCallback) {
        $this->options['statusCallback'] = $statusCallback;
        return $this;
    }

    /**
     * GET, POST
     * 
     * @param string $statusCallbackMethod GET, POST
     * @return $this Fluent Builder
     */
    public function setStatusCallbackMethod($statusCallbackMethod) {
        $this->options['statusCallbackMethod'] = $statusCallbackMethod;
        return $this;
    }

    /**
     * initiated, ringing, answered, completed
     * 
     * @param string $statusCallbackEvent initiated, ringing, answered, completed
     * @return $this Fluent Builder
     */
    public function setStatusCallbackEvent($statusCallbackEvent) {
        $this->options['statusCallbackEvent'] = $statusCallbackEvent;
        return $this;
    }

    /**
     * 5-600
     * 
     * @param integer $timeout 5-600
     * @return $this Fluent Builder
     */
    public function setTimeout($timeout) {
        $this->options['timeout'] = $timeout;
        return $this;
    }

    /**
     * true, false
     * 
     * @param boolean $record true, false
     * @return $this Fluent Builder
     */
    public function setRecord($record) {
        $this->options['record'] = $record;
        return $this;
    }

    /**
     * true, false
     * 
     * @param boolean $muted true, false
     * @return $this Fluent Builder
     */
    public function setMuted($muted) {
        $this->options['muted'] = $muted;
        return $this;
    }

    /**
     * true, false, onEnter, onExit
     * 
     * @param string $beep true, false, onEnter, onExit
     * @return $this Fluent Builder
     */
    public function setBeep($beep) {
        $this->options['beep'] = $beep;
        return $this;
    }

    /**
     * true, false
     * 
     * @param boolean $startConferenceOnEnter true, false
     * @return $this Fluent Builder
     */
    public function setStartConferenceOnEnter($startConferenceOnEnter) {
        $this->options['startConferenceOnEnter'] = $startConferenceOnEnter;
        return $this;
    }

    /**
     * true, false
     * 
     * @param boolean $endConferenceOnExit true, false
     * @return $this Fluent Builder
     */
    public function setEndConferenceOnExit($endConferenceOnExit) {
        $this->options['endConferenceOnExit'] = $endConferenceOnExit;
        return $this;
    }

    /**
     * absolute url
     * 
     * @param string $waitUrl absolute url
     * @return $this Fluent Builder
     */
    public function setWaitUrl($waitUrl) {
        $this->options['waitUrl'] = $waitUrl;
        return $this;
    }

    /**
     * GET, POST
     * 
     * @param string $waitMethod GET, POST
     * @return $this Fluent Builder
     */
    public function setWaitMethod($waitMethod) {
        $this->options['waitMethod'] = $waitMethod;
        return $this;
    }

    /**
     * true, false
     * 
     * @param boolean $earlyMedia true, false
     * @return $this Fluent Builder
     */
    public function setEarlyMedia($earlyMedia) {
        $this->options['earlyMedia'] = $earlyMedia;
        return $this;
    }

    /**
     * 2-10
     * 
     * @param integer $maxParticipants 2-10
     * @return $this Fluent Builder
     */
    public function setMaxParticipants($maxParticipants) {
        $this->options['maxParticipants'] = $maxParticipants;
        return $this;
    }

    /**
     * true, false, record-from-start, do-not-record
     * 
     * @param string $conferenceRecord true, false, record-from-start, do-not-record
     * @return $this Fluent Builder
     */
    public function setConferenceRecord($conferenceRecord) {
        $this->options['conferenceRecord'] = $conferenceRecord;
        return $this;
    }

    /**
     * trim-silence or do-not-trim
     * 
     * @param string $conferenceTrim trim-silence or do-not-trim
     * @return $this Fluent Builder
     */
    public function setConferenceTrim($conferenceTrim) {
        $this->options['conferenceTrim'] = $conferenceTrim;
        return $this;
    }

    /**
     * absolute url
     * 
     * @param string $conferenceStatusCallback absolute url
     * @return $this Fluent Builder
     */
    public function setConferenceStatusCallback($conferenceStatusCallback) {
        $this->options['conferenceStatusCallback'] = $conferenceStatusCallback;
        return $this;
    }

    /**
     * GET, POST
     * 
     * @param string $conferenceStatusCallbackMethod GET, POST
     * @return $this Fluent Builder
     */
    public function setConferenceStatusCallbackMethod($conferenceStatusCallbackMethod) {
        $this->options['conferenceStatusCallbackMethod'] = $conferenceStatusCallbackMethod;
        return $this;
    }

    /**
     * start end join leave mute hold speaker
     * 
     * @param string $conferenceStatusCallbackEvent start end join leave mute hold
     *                                              speaker
     * @return $this Fluent Builder
     */
    public function setConferenceStatusCallbackEvent($conferenceStatusCallbackEvent) {
        $this->options['conferenceStatusCallbackEvent'] = $conferenceStatusCallbackEvent;
        return $this;
    }

    /**
     * mono, dual
     * 
     * @param string $recordingChannels mono, dual
     * @return $this Fluent Builder
     */
    public function setRecordingChannels($recordingChannels) {
        $this->options['recordingChannels'] = $recordingChannels;
        return $this;
    }

    /**
     * absolute url
     * 
     * @param string $recordingStatusCallback absolute url
     * @return $this Fluent Builder
     */
    public function setRecordingStatusCallback($recordingStatusCallback) {
        $this->options['recordingStatusCallback'] = $recordingStatusCallback;
        return $this;
    }

    /**
     * GET, POST
     * 
     * @param string $recordingStatusCallbackMethod GET, POST
     * @return $this Fluent Builder
     */
    public function setRecordingStatusCallbackMethod($recordingStatusCallbackMethod) {
        $this->options['recordingStatusCallbackMethod'] = $recordingStatusCallbackMethod;
        return $this;
    }

    /**
     * sip username
     * 
     * @param string $sipAuthUsername sip username
     * @return $this Fluent Builder
     */
    public function setSipAuthUsername($sipAuthUsername) {
        $this->options['sipAuthUsername'] = $sipAuthUsername;
        return $this;
    }

    /**
     * sip password
     * 
     * @param string $sipAuthPassword sip password
     * @return $this Fluent Builder
     */
    public function setSipAuthPassword($sipAuthPassword) {
        $this->options['sipAuthPassword'] = $sipAuthPassword;
        return $this;
    }

    /**
     * us1, ie1, de1, sg1, br1, au1, jp1
     * 
     * @param string $region us1, ie1, de1, sg1, br1, au1, jp1
     * @return $this Fluent Builder
     */
    public function setRegion($region) {
        $this->options['region'] = $region;
        return $this;
    }

    /**
     * absolute url
     * 
     * @param string $conferenceRecordingStatusCallback absolute url
     * @return $this Fluent Builder
     */
    public function setConferenceRecordingStatusCallback($conferenceRecordingStatusCallback) {
        $this->options['conferenceRecordingStatusCallback'] = $conferenceRecordingStatusCallback;
        return $this;
    }

    /**
     * GET, POST
     * 
     * @param string $conferenceRecordingStatusCallbackMethod GET, POST
     * @return $this Fluent Builder
     */
    public function setConferenceRecordingStatusCallbackMethod($conferenceRecordingStatusCallbackMethod) {
        $this->options['conferenceRecordingStatusCallbackMethod'] = $conferenceRecordingStatusCallbackMethod;
        return $this;
    }

    /**
     * The recording_status_callback_event
     * 
     * @param string $recordingStatusCallbackEvent The
     *                                             recording_status_callback_event
     * @return $this Fluent Builder
     */
    public function setRecordingStatusCallbackEvent($recordingStatusCallbackEvent) {
        $this->options['recordingStatusCallbackEvent'] = $recordingStatusCallbackEvent;
        return $this;
    }

    /**
     * The conference_recording_status_callback_event
     * 
     * @param string $conferenceRecordingStatusCallbackEvent The
     *                                                       conference_recording_status_callback_event
     * @return $this Fluent Builder
     */
    public function setConferenceRecordingStatusCallbackEvent($conferenceRecordingStatusCallbackEvent) {
        $this->options['conferenceRecordingStatusCallbackEvent'] = $conferenceRecordingStatusCallbackEvent;
        return $this;
    }

    /**
     * Provide a friendly representation
     * 
     * @return string Machine friendly representation
     */
    public function __toString() {
        $options = array();
        foreach ($this->options as $key => $value) {
            if ($value != Values::NONE) {
                $options[] = "$key=$value";
            }
        }
        return '[Twilio.Api.V2010.CreateParticipantOptions ' . implode(' ', $options) . ']';
    }
}

class ReadParticipantOptions extends Options {
    /**
     * @param boolean $muted Filter by muted participants
     * @param boolean $hold Only show participants that are held or unheld.
     */
    public function __construct($muted = Values::NONE, $hold = Values::NONE) {
        $this->options['muted'] = $muted;
        $this->options['hold'] = $hold;
    }

    /**
     * Only show participants that are muted or unmuted. Either `true` or `false`.
     * 
     * @param boolean $muted Filter by muted participants
     * @return $this Fluent Builder
     */
    public function setMuted($muted) {
        $this->options['muted'] = $muted;
        return $this;
    }

    /**
     * Only show participants that are held or unheld. Either `true` or `false`.
     * 
     * @param boolean $hold Only show participants that are held or unheld.
     * @return $this Fluent Builder
     */
    public function setHold($hold) {
        $this->options['hold'] = $hold;
        return $this;
    }

    /**
     * Provide a friendly representation
     * 
     * @return string Machine friendly representation
     */
    public function __toString() {
        $options = array();
        foreach ($this->options as $key => $value) {
            if ($value != Values::NONE) {
                $options[] = "$key=$value";
            }
        }
        return '[Twilio.Api.V2010.ReadParticipantOptions ' . implode(' ', $options) . ']';
    }
}