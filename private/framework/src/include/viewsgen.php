<?
$OBJECT_DIRECTOR_NAME = strtolower($OBJECT_NAME);
$xslDirName = $PROJECT_ROOT . $PROJECT_XSL_DIR_NAME . $OBJECT_DIRECTOR_NAME;
if (!file_exists($xslDirName)) {
    mkdir($xslDirName, 0777);
}


$listsXSL = "<xsl:stylesheet version=\"1.0\"
	xmlns:xsl=\"http://www.w3.org/1999/XSL/Transform\"
	xmlns:pre=\"http://www.generated-content.com/xsl/process\">
<xsl:output method=\"xml\" encoding=\"utf-8\" indent=\"no\" omit-xml-declaration=\"no\" media-type=\"application/xhtml+xml\"/>
<xsl:template match=\"/root\">


<div id=\"entryContainer\" class=\"entryContainer\">
<form action=\"?stack=$OBJECT_DIRECTOR_NAME&amp;action=" . $OBJECT_DIRECTOR_NAME . "&amp;method=insert\" method=\"POST\">
<table>
	<tbody>
	";

foreach ($dbPropertiesArray as $key => $valueArray) {

    if (array_key_exists($key, $RELATIONS_ARRAY)) {
        $listsXSL .= "
	<tr>
		<td>
			" . $RELATIONS_ARRAY[$key]["relationClass"] . ":
		</td>
		<td>
			<select name=\"" . $key . "\">
				<xsl:for-each select=\"" . $RELATIONS_ARRAY[$key]["relationTable"] . "s/" . $RELATIONS_ARRAY[$key]["relationTable"] . "\">
					<option value=\"{" . $RELATIONS_ARRAY[$key]["relationField"] . "}\"><xsl:value-of select=\"" . $RELATIONS_ARRAY[$key]["viewField"] . "\" /></option>
				</xsl:for-each>
			</select>
		</td>
	</tr>";
    } else {
        $listsXSL .= "
	<tr>
		<td>
			" . $key . ":
		</td>
		<td>
			<input type=\"text\" name=\"" . $key . "\" value=\"{" . $key . "}\"/>
		</td>
	</tr>";
    }

}
$listsXSL .= "
	<tr>
		<td>
			
		</td>
		<td>
			<input type=\"submit\" name=\"submitbutton\" value=\"Ok\"/>
		</td>
	</tr>
	</tbody>
</table>
</form>
</div>

<div class=\"listingContainer\">

<table>
	<thead>
	<tr>";

foreach ($dbPropertiesArray as $key => $valueArray) {
    $listsXSL .= "
		<td>
			<a href=\"?stack=$OBJECT_DIRECTOR_NAME&amp;action=$OBJECT_DIRECTOR_NAME&amp;method=lists&amp;orderSelection=" . $key . "&amp;\">" . $key . "</a>
		</td>";
}
$listsXSL .= "
		<td>
		</td>
	</tr>
	</thead>
	<tbody>
	<xsl:for-each select=\"" . $TABLE_NAME . "s/" . $TABLE_NAME . "\">
	<xsl:choose>
	<xsl:when test=\"position() mod 2 = 0 \">
	
	<tr class=\"bg1\">
	";

foreach ($dbPropertiesArray as $key => $valueArray) {

    if (array_key_exists($key, $RELATIONS_ARRAY)) {
        $listsXSL .= "
		<td>
			(<xsl:value-of select=\"" . $key . "\" />)
			<xsl:value-of select=\"" . $RELATIONS_ARRAY[$key]["relationClass"] . "/" . $RELATIONS_ARRAY[$key]["viewField"] . "\" />
		</td>";
    } else {
        $listsXSL .= "
		<td>
			<xsl:value-of select=\"" . $key . "\" />
		</td>";
    }

}
$listsXSL .= "
		<td>
			<a href=\"?stack=" . $OBJECT_DIRECTOR_NAME . "&amp;action=" . $OBJECT_NAME . "&amp;method=edit&amp;id={id}\">Update</a>
			&#160;
			<a href=\"?stack=" . $OBJECT_DIRECTOR_NAME . "&amp;action=" . $OBJECT_NAME . "&amp;method=delete&amp;id={id}\">Delete</a>
		</td>
	</tr>
	
	</xsl:when>
	<xsl:otherwise>
	<tr class=\"bg0\">
	";

foreach ($dbPropertiesArray as $key => $valueArray) {
    if (array_key_exists($key, $RELATIONS_ARRAY)) {
        $listsXSL .= "
		<td>
			(<xsl:value-of select=\"" . $key . "\" />)
			<xsl:value-of select=\"" . $RELATIONS_ARRAY[$key]["relationClass"] . "/" . $RELATIONS_ARRAY[$key]["viewField"] . "\" />
		</td>";
    } else {
        $listsXSL .= "
		<td>
			<xsl:value-of select=\"" . $key . "\" />
		</td>";
    }
}
$listsXSL .= "
		<td>
			<a href=\"?stack=" . $OBJECT_DIRECTOR_NAME . "&amp;action=" . $OBJECT_NAME . "&amp;method=edit&amp;id={id}\">Update</a>
			&#160;
			<a href=\"?stack=" . $OBJECT_DIRECTOR_NAME . "&amp;action=" . $OBJECT_NAME . "&amp;method=delete&amp;id={id}\">Delete</a>
		</td>
	</tr>
	</xsl:otherwise>
	</xsl:choose>
	
	</xsl:for-each>
	</tbody>
</table>
</div>
</xsl:template>
</xsl:stylesheet>
";

if (!file_exists($xslDirName . "/lists.xsl")) {
    file_put_contents($xslDirName . "/lists.xsl", $listsXSL);
}


$editXSL = "<xsl:stylesheet version=\"1.0\"
	xmlns:xsl=\"http://www.w3.org/1999/XSL/Transform\"
	xmlns:pre=\"http://www.generated-content.com/xsl/process\">
<xsl:output method=\"xml\" encoding=\"utf-8\" indent=\"no\" omit-xml-declaration=\"no\" media-type=\"application/xhtml+xml\"/>
<xsl:template match=\"/root\">


<div id=\"editContainer\" class=\"editContainer\">
<xsl:for-each select=\"" . $TABLE_NAME . "\">
<span class=\"title\">Update</span>
<form action=\"?stack=$OBJECT_DIRECTOR_NAME&amp;action=$OBJECT_DIRECTOR_NAME&amp;method=update\" method=\"POST\">
<table>
	<tbody>
	
	";
foreach ($dbPropertiesArray as $key => $valueArray) {
    if (array_key_exists($key, $RELATIONS_ARRAY)) {
        $editXSL .= "
	<tr>
		<td>
			$key:
		</td>
		<td>
			<select name=\"" . $key . "\">
			<xsl:for-each select=\"/root/" . $RELATIONS_ARRAY[$key]["relationTable"] . "s/" . $RELATIONS_ARRAY[$key]["relationTable"] . "\">
				<xsl:choose>
					<xsl:when test=\"id = /root/" . $RELATIONS_ARRAY[$key]["relationTable"] . "s/" . $RELATIONS_ARRAY[$key]["relationTable"] . "\">
						<option value=\"{" . $RELATIONS_ARRAY[$key]["relationField"] . "}\" selected=\"true\"><xsl:value-of select=\"" . $RELATIONS_ARRAY[$key]["viewField"] . "\" /></option>
					</xsl:when>
					<xsl:otherwise>
						<option value=\"{" . $RELATIONS_ARRAY[$key]["relationField"] . "}\"><xsl:value-of select=\"" . $RELATIONS_ARRAY[$key]["viewField"] . "\" /></option>
					</xsl:otherwise>
			</xsl:choose>
			</xsl:for-each>
		</select>
		</td>
	</tr>";
    } else {
        $editXSL .= "
	<tr>
		<td>
			$key:
		</td>
		<td>
			<input type=\"text\" name=\"$key\" value=\"{" . $key . "}\"/>
		</td>
	</tr>";
    }

}
$editXSL .= "
	<tr>
		<td>
			
		</td>
		<td>
			<input type=\"submit\" name=\"submitbutton\" value=\"Ok\"/>
		</td>
	</tr>
	
	</tbody>
</table>
</form>
</xsl:for-each>

</div>
</xsl:template>
</xsl:stylesheet>
";

if (!file_exists($xslDirName . "/edit.xsl")) {
    file_put_contents($xslDirName . "/edit.xsl", $editXSL);
}


$stackXSL = "<xsl:stylesheet version=\"1.0\"
xmlns:xsl=\"http://www.w3.org/1999/XSL/Transform\" 
xmlns:pre=\"http://www.generated-content.com/xsl/process\" >
<xsl:output method=\"xml\" indent=\"no\" omit-xml-declaration=\"no\" media-type=\"application/xhtml+xml\" encoding=\"UTF-8\"/>
<xsl:template match=\"/root\">

<div class=\"stackContainer\">
<a href=\"?stack=$OBJECT_DIRECTOR_NAME&amp;action=$OBJECT_DIRECTOR_NAME&amp;method=lists\"><span class=\"title\">$OBJECT_NAME Stack</span></a>

<br />

<pre:insert>private/project/xsl/$OBJECT_DIRECTOR_NAME/edit</pre:insert>

<br />

<pre:insert>private/project/xsl/$OBJECT_DIRECTOR_NAME/lists</pre:insert>

</div>
</xsl:template>
</xsl:stylesheet>";


if (!file_exists($PROJECT_ROOT . $PROJECT_XSL_DIR_NAME . "stack/" . $OBJECT_DIRECTOR_NAME . ".xsl")) {
    file_put_contents($PROJECT_ROOT . $PROJECT_XSL_DIR_NAME . "stack/" . $OBJECT_DIRECTOR_NAME . ".xsl", $stackXSL);
}








$stackEntityName = lcfirst($OBJECT_NAME);

$stackFileName = $PROJECT_ROOT . $PROJECT_XML_DIR_NAME . "stack.xml";

$stackFileContent = file_get_contents($stackFileName);

$stackFileContent = str_replace(
    "    <!-- Stacks -->
",
    "    <!-- Stacks -->
    <stack name=\"".$stackEntityName."\">
        <beans>
            <bean name=\"".$stackEntityName."\" method=\"lists\"/>
        </beans>
    </stack>
",
    $stackFileContent);

file_put_contents($stackFileName, $stackFileContent);





