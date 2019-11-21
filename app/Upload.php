<?php

namespace App;

use Carbon\Carbon;

use App\Models\Paper;
use App\Models\Forward;

use Illuminate\Database\Eloquent\Model;

class Upload
{
    /**
     * Generate Manuscript No
     *
     * @param [type] $manuscript
     * @return string|null
     */
    public static function generateNumber($file, $type)
    {
        $guessExtension = $file->guessExtension();
        $year = self::currentYear();
        $paper = self::getPaperNo();

        return $year . '_SAJA_' . $paper . '_' . $type . '.' . $guessExtension;
    }

    /**
     * Generate No for Revision
     *
     * @param [type] $file
     * @param [type] $type
     * @param Paper $paper
     * @return string|null
     */
    public static function generateNumberRevision($file, $type, Paper $paper)
    {
        $guessExtension = $file->guessExtension();
        $fileName = self::mainPaperManuscript($paper);
        return $fileName . '_' . $type . '.' . $guessExtension;
    }

    /**
     * Get New File Name
     *
     * @param [type] $file
     * @param [type] $fileName
     * @return string|null
     */
    public static function getFileName($file, $fileName)
    {
        $guessExtension = $file->guessExtension();
        $originalFile = self::cutExtension($fileName);

        return $originalFile . '.' . $guessExtension;
    }

    /**
     * Generate Reviewed Manuscript Number
     *
     * @param Forward $forward
     * @return string|null
     */
    public static function generateReviewedNumber(Forward $forward, $manuscript, $type)
    {
        $guessExtension = $manuscript->guessExtension();
        $manuscript = self::mainManuscript($forward);
        $counter = self::findSerial($forward);

        if ($type == "Manuscript") {
            $type = "Reviewed_Manuscript";
        }

        return $manuscript . '_' . $type . '_' . $counter . '.' . $guessExtension;
    }

    /**
     * Generate Reviewed Opinion Number
     *
     * @param Forward $forward
     * @param [type] $opinionFormat
     * @return void
     */
    public static function generateOpinionFormatNo(Forward $forward, $opinionFormat)
    {
        $guessExtension = $opinionFormat->guessExtension();
        $manuscript = self::mainManuscript($forward);
        $counter = self::findSerial($forward);
        return $manuscript . '_opinion_' . $counter . '.' . $guessExtension;
    }

    /**
     * Find Main Manuscript from Forwarded Paper
     *
     * @param Forward $forward
     * @return string|null
     */
    protected static function mainManuscript(Forward $forward)
    {
        $paper = Paper::find($forward->paper_id);
        return self::mainPaperManuscript($paper);
        // $fileName = str_replace('_Manuscript', '', $paper->manuscript);
        // return self::cutExtension($fileName);
        //return preg_replace('/\\.[^.\\s]{3,4}$/', '', $fileName);
    }

    /**
     * Find Main Paper's Manuscript Name
     *
     * @param Paper $paper
     * @return string|null
     */
    protected static function mainPaperManuscript(Paper $paper)
    {
        $fileName = str_replace('_Manuscript', '', $paper->manuscript);
        return self::cutExtension($fileName);
    }

    /**
     * Cut Out Extension of FileName
     *
     * @param [type] $fileName
     * @return string|null
     */
    protected static function cutExtension($fileName)
    {
        return preg_replace('/\\.[^.\\s]{3,4}$/', '', $fileName);
    }

    /**
     * Get Serial of the Forwarded
     *
     * @param Forward $forward
     * @return void
     */
    protected static function findSerial(Forward $forward)
    {
        $paper = Paper::find($forward->paper_id);

        foreach ($paper->forwards as $key => $paperForward) {
            if ($paperForward->id == $forward->id) {
                return $counter = $key + 1;
            }
        }
    }


    /**
     * Get Year's Paper No
     *
     * @return integer
     */
    protected static function getPaperNo()
    {
        $year = self::currentYear();
        return Paper::whereYear('created_at', $year)->count() + 1;
    }

    /**
     * Get Current Year
     *
     * @return year
     */
    protected static function currentYear()
    {
        return  Carbon::now()->year;
    }
}
