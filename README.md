# rebrickable-part-lists-comparer
Php library and scripts to compare part-lists from [rebrickable](https://rebrickable.com/home/).
With this library you can check which parts are left over when you subtract another part list.

## Usages
### Library
You can use it in your php script and classes.

#### Example
```php
$partsA = [];
$part = new \Vogaeael\RebrickablePartListsComparer\Model\RebrickablePart('99781', '0', 1, 0);
$partsA[$part->generateKey()] = $part;
$part = new \Vogaeael\RebrickablePartListsComparer\Model\RebrickablePart('25269', '71', 2, 1);
$partsA[$part->generateKey()] = $part;
$part = new \Vogaeael\RebrickablePartListsComparer\Model\RebrickablePart('26601', '71', 2, 0);
$partsA[$part->generateKey()] = $part;

$partsB = [];
$part = new \Vogaeael\RebrickablePartListsComparer\Model\RebrickablePart('50304', '71', 1, 0);
$partsB[$part->generateKey()] = $part;
$part = new \Vogaeael\RebrickablePartListsComparer\Model\RebrickablePart('99781', '0', 1, 1);
$partsB[$part->generateKey()] = $part;
$part = new \Vogaeael\RebrickablePartListsComparer\Model\RebrickablePart('25269', '71', 1, 1);
$partsB[$part->generateKey()] = $part;

$compare = new \Vogaeael\RebrickablePartListsComparer\Comparer();

$result = $compare->subtractList(\Vogaeael\RebrickablePartListsComparer\Types::Rebrickable, $partsA, $partsB);
```

### Script
You can run the implemented script to subtract files.

#### Example
```bash
php src/compareFiles.php BrickLink data/test-bricklink-a.xml data/test-bricklink-b.xml data/bricklink-result.xml
```

## Requirements
- PHP 8.1
- Simplexml PHP Extension

## Supported Types
### Bricklink
The Bricklink-Format with following attributes
- ItemType
- ItemId
- ColorId
- Quantity

#### Example File
```xml
<INVENTORY>
    <ITEM>
        <ITEMTYPE>P</ITEMTYPE>
        <ITEMID>99781</ITEMID>
        <COLOR>11</COLOR>
        <MINQTY>1</MINQTY>
    </ITEM>
    <ITEM>
        <ITEMTYPE>P</ITEMTYPE>
        <ITEMID>6112</ITEMID>
        <COLOR>11</COLOR>
        <MINQTY>2</MINQTY>
    </ITEM>
...
    <ITEM>
        <ITEMTYPE>P</ITEMTYPE>
        <ITEMID>75435stk01</ITEMID>
        <COLOR>0</COLOR>
        <MINQTY>1</MINQTY>
    </ITEM>
</INVENTORY>
```

### BrickStore
The BrickStore-Format with following attributes
- ItemTypeId
- ItemId
- ColorId
- Quantity

#### Example File
```bsx
<BrickStoreXML>
    <Inventory>
        <Item>
            <ItemTypeID>P</ItemTypeID>
            <ItemID>99781</ItemID>
            <ColorID>11</ColorID>
            <Qty>1</Qty>
        </Item>
        ...
    </Inventory>
</BrickStoreXML>
```

### LDCad
The LDCas-Format with following attributes
- Identifier
- SourceInv
- ColorId
- Quantity

#### Example File
```pbg
[options]
kind=basic
caption=75435-1-Battle of Felucia Separatist MTT
sortOn=description

<items>
99781.dat:[sourceInv=parts] [color=0] [count=1]
6112.dat:[sourceInv=parts] [color=0] [count=2]
...
```

### Lego Pick a Brick
The Lego Pick a Brick-Format with following attributes
- ElementId
- Quantity

#### Example File
```csv
elementId,quantity
6016172,1
611226,2
301026,1
...
```

### Rebrickable
The Rebrickable-Format with following attributes
- Part
- Color
- Quantity
- Is Sapre

#### Example File
```csv
Part,Color,Quantity,Is Spare
99781,0,1,False
6112,0,2,False
3010,0,1,False
...
```
