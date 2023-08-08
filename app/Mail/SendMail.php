<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;
    public $patientInformations;
    public $facilityTestCollection;
    public $allMedicalResultData;
    public $medicalTestName;
    public $pdf;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($patientInformations, $facilityTestCollection,$allMedicalResultData,$medicalTestName,$pdf)
    {
        $this->patientInformations = $patientInformations;
        $this->facilityTestCollection = $facilityTestCollection;
        $this->allMedicalResultData = $allMedicalResultData;
        $this->medicalTestName = $medicalTestName;
        $this->pdf = $pdf;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('results@covidclinic.org')
            ->subject('Covid Clinic Report')
            ->view('email')
            ->attachData($this->pdf->output(),'report.pdf');
    }
}

?>
