<?
class CurrencyTool {

    /**
     * @var array
     */
    private $priceTypes = array('YTL', 'EUR', 'USD', 'GBP');

    private $priceTypesArray = array(
        "price" => array(
            array('currency' => 'YTL'),
            array('currency' => 'EUR'),
            array('currency' => 'USD'),
            array('currency' => 'GBP')
        )
    );


    /**
     * @container
     * */
    private $container;

    /**
     * @param Container container
     * @return void
     */
    public function setContainer(Container $container) {
        $this->container = $container;
    }

    //end of setContainer

    /**
     * @return Container
     */
    public function getContainer() {
        return $this->container;
    }

    //end of getContainer

    /**
     * @param float $price
     * @param int $decimals
     * @return string
     */
    public function getPriceFormat($price, $decimals = 0) {
        if (is_null($decimals) || !is_numeric($decimals)){
            $decimals = 0;
        }
        return number_format($price, $decimals, ",", ".");
    }

    /**
     * @param $from
     * @param $to
     * @param $price
     * @return float
     */
    public function transformPrice($from, $to, $price) {
        /*
        $select = "parity_" . strtolower($to);
        $price_sql = "SELECT " . $select . " FROM price_type WHERE currency='$from' ";
        $parityPrice = $this->getContainer()->getDb()->queryFetchArrayResult($this->getContainer()->getDb()->dbQuery($price_sql), 0, $select);
        return floor($price * $parityPrice);
        */
        return null;
    }

    /**
     * @return array
     */
    public function getPriceTypes() {
        return $this->priceTypes;
    }


    /**
     * @return array
     */
    public function getPriceTypesArray() {
        return $this->priceTypesArray;
    }

    /**
     * @return string
     */
    public function getPriceTypesArrayXML() {
        $xmlArray = $this->getPriceTypesArray();
        return $this->getContainer()->getXmlGenerator()->generateXml($xmlArray, "price");
    }
}

