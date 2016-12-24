<xsl:stylesheet version="1.0"
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
	xmlns:pre="http://www.generated-content.com/xsl/process">
<xsl:output method="xml" encoding="utf-8" indent="no" omit-xml-declaration="no" media-type="application/xhtml+xml"/>
<xsl:template match="/root">


<div id="entryContainer" class="entryContainer">
<form action="?stack=userkeyvalue&amp;action=userkeyvalue&amp;method=insert" method="POST">
<table>
	<tbody>
	
	<tr>
		<td>
			id:
		</td>
		<td>
			<input type="text" name="id" value="{id}"/>
		</td>
	</tr>
	<tr>
		<td>
			User:
		</td>
		<td>
			<select name="user_id">
				<xsl:for-each select="users/user">
					<option value="{id}"><xsl:value-of select="user_name" /></option>
				</xsl:for-each>
			</select>
		</td>
	</tr>
	<tr>
		<td>
			key:
		</td>
		<td>
			<input type="text" name="key" value="{key}"/>
		</td>
	</tr>
	<tr>
		<td>
			value:
		</td>
		<td>
			<input type="text" name="value" value="{value}"/>
		</td>
	</tr>
	<tr>
		<td>
			
		</td>
		<td>
			<input type="submit" name="submitbutton" value="Ok"/>
		</td>
	</tr>
	</tbody>
</table>
</form>
</div>

<div class="listingContainer">

<table>
	<thead>
	<tr>
		<td>
			<a href="?stack=userkeyvalue&amp;action=userkeyvalue&amp;method=lists&amp;orderSelection=id&amp;">id</a>
		</td>
		<td>
			<a href="?stack=userkeyvalue&amp;action=userkeyvalue&amp;method=lists&amp;orderSelection=user_id&amp;">user_id</a>
		</td>
		<td>
			<a href="?stack=userkeyvalue&amp;action=userkeyvalue&amp;method=lists&amp;orderSelection=key&amp;">key</a>
		</td>
		<td>
			<a href="?stack=userkeyvalue&amp;action=userkeyvalue&amp;method=lists&amp;orderSelection=value&amp;">value</a>
		</td>
		<td>
		</td>
	</tr>
	</thead>
	<tbody>
	<xsl:for-each select="user_key_values/user_key_value">
	<xsl:choose>
	<xsl:when test="position() mod 2 = 0 ">
	
	<tr class="bg1">
	
		<td>
			<xsl:value-of select="id" />
		</td>
		<td>
			(<xsl:value-of select="user_id" />)
			<xsl:value-of select="User/user_name" />
		</td>
		<td>
			<xsl:value-of select="key" />
		</td>
		<td>
			<xsl:value-of select="value" />
		</td>
		<td>
			<a href="?stack=userkeyvalue&amp;action=userKeyValue&amp;method=edit&amp;id={id}">Update</a>
			&#160;
			<a href="?stack=userkeyvalue&amp;action=userKeyValue&amp;method=delete&amp;id={id}">Delete</a>
		</td>
	</tr>
	
	</xsl:when>
	<xsl:otherwise>
	<tr class="bg0">
	
		<td>
			<xsl:value-of select="id" />
		</td>
		<td>
			(<xsl:value-of select="user_id" />)
			<xsl:value-of select="User/user_name" />
		</td>
		<td>
			<xsl:value-of select="key" />
		</td>
		<td>
			<xsl:value-of select="value" />
		</td>
		<td>
			<a href="?stack=userkeyvalue&amp;action=userKeyValue&amp;method=edit&amp;id={id}">Update</a>
			&#160;
			<a href="?stack=userkeyvalue&amp;action=userKeyValue&amp;method=delete&amp;id={id}">Delete</a>
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
