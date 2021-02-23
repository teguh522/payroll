<?php
require APPPATH . 'libraries/PDF_JavaScript.php';
class PDF_AutoPrint extends PDF_JavaScript 
{
    public function AutoPrint($printer = '')
    {
        // Open the print dialog
        if ($printer) {
            $printer = str_replace('\\', '\\\\', $printer);
            $script = "var pp = getPrintParams();";
            $script .= "pp.interactive = pp.constants.interactionLevel.full;";
            $script .= "pp.printerName = '$printer'";
            $script .= "print(pp);";
        } else {
            $script = 'print(true);';
        }

        $this->IncludeJS($script);
    }
}
