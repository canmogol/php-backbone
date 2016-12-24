<?
if (count($_POST) > 0) {
    pg_connect("host=" . $_POST['host'] . " port=" . $_POST['port'] . " dbname=" . $_POST['dbname'] . " user=" . $_POST['user'] . " password=" . $_POST['password'] . "");
    $resultTable = pg_query("SELECT table_name FROM information_schema.tables WHERE table_schema = 'public'");
    $allTableNamesArray = array();
    while ($myRow = pg_fetch_array($resultTable)) {
        array_push($allTableNamesArray, $myRow["table_name"]);
    }

    $nToNRelationTablesArray = array();
    foreach ($allTableNamesArray as $tableName) {
        $explodedTableNames = explode("_", $tableName);
        if (count($explodedTableNames) > 0) {
            $restOfTableName = "";
            $exTableNameCont = "";
            $count = 0;
            foreach ($explodedTableNames as $exTableName) {
                if ($count == 0) {
                    $exTableNameCont = $exTableName;
                } else {
                    $exTableNameCont .= "_" . $exTableName;
                }
                if (in_array($exTableNameCont, $allTableNamesArray)) {
                    for ($i = $count + 1; $i < count($explodedTableNames); $i++) {
                        if ($i > $count + 1) {
                            $restOfTableName .= "_" . $explodedTableNames[$i];
                        } else {
                            $restOfTableName .= $explodedTableNames[$i];
                        }
                    }
                    if (in_array($restOfTableName, $allTableNamesArray)) {
                        if (!in_array($tableName, $nToNRelationTablesArray)) {
                            $nToNRelationTablesArray[] = $tableName;
                        }
                    }
                }
                $count++;
            }
        }
    }

    $NTON_RELATION_TABLES = $nToNRelationTablesArray;

    $allNonNtoNRelationTablesArray = array_diff($allTableNamesArray, $nToNRelationTablesArray);
    foreach ($allNonNtoNRelationTablesArray as $tableName) {
        $TABLE_NAME = $tableName;
        include("mosgen.php");
    }

    echo "end of generation.<br>";
}
?>

<form action="<?echo $HTTP_SERVER_VARS['PHP_SELF'];?>" method="POST">
    <table>
        <tr>
            <td colspan="2">
                <table>
                    <tr>
                        <td>
                            host:
                        </td>
                        <td>
                            <input type="text" name="host" value="127.0.0.1"/>
                        </td>
                    <tr>
                        <td>
                            port:
                        </td>
                        <td>
                            <input type="text" name="port" value="5432"/>
                        </td>
                    <tr>
                        <td>
                            dbname:
                        </td>
                        <td>
                            <input type="text" name="dbname" value="fkkscndb"/>
                        </td>
                    <tr>
                        <td>
                            user:
                        </td>
                        <td>
                            <input type="text" name="user" value="alicanmogol"/>
                        </td>
                    <tr>
                        <td>
                            password:
                        </td>
                        <td>
                            <input type="password" name="password" value=""/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            PROJECT ROOT DIR:
                        </td>
                        <td>
                            <input type="text" name="project_root_dir_name" value="private/project/"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            FRAMEWORK ROOT DIR:
                        </td>
                        <td>
                            <input type="text" name="framework_root_dir_name" value="private/framework/"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            CSSXML DIR:
                        </td>
                        <td>
                            <input type="text" name="xsl_dir" value="private/project/"/>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr>
            <td>
                <input type="checkbox" name="model"/>
            </td>
            <td>
                Model
            </td>
        </tr>

        <tr>
            <td>
                <input type="checkbox" name="serviceinterface"/>
            </td>
            <td>
                Service Interface
            </td>
        </tr>

        <tr>
            <td>
                <input type="checkbox" name="serviceimpl"/>
            </td>
            <td>
                Service Implementation
            </td>
        </tr>

        <tr>
            <td>
                <input type="checkbox" name="actioninterface"/>
            </td>
            <td>
                Action Interface
            </td>
        </tr>

        <tr>
            <td>
                <input type="checkbox" name="actionimpl"/>
            </td>
            <td>
                Action Implementation
            </td>
        </tr>

        <tr>
            <td>
                <input type="checkbox" name="modelmanager"/>
            </td>
            <td>
                Model Manager
            </td>
        </tr>

        <tr>
            <td>
                <input type="checkbox" name="servicemanager"/>
            </td>
            <td>
                Service Manager
            </td>
        </tr>

        <tr>
            <td>
                <input type="checkbox" name="actionmanager"/>
            </td>
            <td>
                Action Manager
            </td>
        </tr>

        <tr>
            <td>
                <input type="checkbox" name="context"/>
            </td>
            <td>
                Context.xml
            </td>
        </tr>

        <tr>
            <td>
                <input type="checkbox" name="views"/>
            </td>
            <td>
                views
            </td>
        </tr>

        <tr>
            <td>

            </td>
            <td>
                <input type="submit" value="generate"/>
            </td>
        </tr>

    </table>
</form>
