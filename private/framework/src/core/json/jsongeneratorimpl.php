<?
/**
 * @package tool
 */
class JSONGeneratorImpl implements JSONGenerator {


    /**
     * @var string
     */
    private $json;



    /**
     *
     * @param array $array
     * @return string
     * @access public
     */
    public function generateJSON(array $array) {
        $this->json = "";
        return $this->generator($array);
    }


    /**
     * @param array $array
     * @return String
     * @access public
     */
    private function generator(array $array) {
        foreach ($array as $value) {
            if (is_array($value)) {
                $this->generator($value);
            } else {
                $this->json .= json_encode($value, JSON_FORCE_OBJECT);
            }
        }
        return $this->json;
    }


}
