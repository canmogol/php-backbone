<xsl:stylesheet version="1.0"
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
	xmlns:pre="http://www.generated-content.com/xsl/process">
<xsl:output method="xml" encoding="utf-8" indent="no" omit-xml-declaration="no" media-type="application/xhtml+xml"/>
<xsl:template match="/root">


<div id="entryContainer" class="entryContainer">
<form action="?stack=specialurlregexpkey&amp;action=specialurlregexpkey&amp;method=insert" method="POST">
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
			special_url_id:
		</td>
		<td>
			<input type="text" name="special_url_id" value="{special_url_id}"/>
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
			position:
		</td>
		<td>
			<input type="text" name="position" value="{position}"/>
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
			<a href="?stack=specialurlregexpkey&amp;action=specialurlregexpkey&amp;method=lists&amp;orderSelection=id&amp;">id</a>
		</td>
		<td>
			<a href="?stack=specialurlregexpkey&amp;action=specialurlregexpkey&amp;method=lists&amp;orderSelection=special_url_id&amp;">special_url_id</a>
		</td>
		<td>
			<a href="?stack=specialurlregexpkey&amp;action=specialurlregexpkey&amp;method=lists&amp;orderSelection=key&amp;">key</a>
		</td>
		<td>
			<a href="?stack=specialurlregexpkey&amp;action=specialurlregexpkey&amp;method=lists&amp;orderSelection=position&amp;">position</a>
		</td>
		<td>
		</td>
	</tr>
	</thead>
	<tbody>
	<xsl:for-each select="special_url_regexp_keys/special_url_regexp_key">
	<xsl:choose>
	<xsl:when test="position() mod 2 = 0 ">
	
	<tr class="bg1">
	
		<td>
			<xsl:value-of select="id" />
		</td>
		<td>
			<xsl:value-of select="special_url_id" />
		</td>
		<td>
			<xsl:value-of select="key" />
		</td>
		<td>
			<xsl:value-of select="position" />
		</td>
		<td>
			<a href="?stack=specialurlregexpkey&amp;action=specialUrlRegexpKey&amp;method=edit&amp;id={id}">Update</a>
			&#160;
			<a href="?stack=specialurlregexpkey&amp;action=specialUrlRegexpKey&amp;method=delete&amp;id={id}">Delete</a>
		</td>
	</tr>
	
	</xsl:when>
	<xsl:otherwise>
	<tr class="bg0">
	
		<td>
			<xsl:value-of select="id" />
		</td>
		<td>
			<xsl:value-of select="special_url_id" />
		</td>
		<td>
			<xsl:value-of select="key" />
		</td>
		<td>
			<xsl:value-of select="position" />
		</td>
		<td>
			<a href="?stack=specialurlregexpkey&amp;action=specialUrlRegexpKey&amp;method=edit&amp;id={id}">Update</a>
			&#160;
			<a href="?stack=specialurlregexpkey&amp;action=specialUrlRegexpKey&amp;method=delete&amp;id={id}">Delete</a>
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
