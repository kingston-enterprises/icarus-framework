Helpers
=======


Collection
----------

.. code-block:: console

  `kingston\icarus\helepers`
  `class Collection implements IteratorAggregate`

class Collection is an easy wrapper for working with arrays of data

Properties
++++++++++

+--------------------+----------------------------------------+------------------------------------------------------------+
| protected array    | $items                                 | items in collection                                        |
+--------------------+----------------------------------------+------------------------------------------------------------+

Methods
++++++++++

.. code-block:: console

    public function get() : array

return items

*Parameters*

    *none*

*return*

    array

* * *

.. code-block:: console

    public function count() : int

return items count

*Parameters*

    *none*

*return*

    int

* * *

.. code-block:: console

    public function countIf($prop, $value) : int

return items based on property

*Parameters*

+--------------------+--------------------+
| mixed              | $prop              | 
+--------------------+--------------------+
| mixed              | $value             |
+--------------------+--------------------+


*return*

    int

* * *

.. code-block:: console

    public function toJson() : string|false

return items array in json format

*Parameters*

    *none*

*return*

    string|false

* * *

.. code-block:: console

    public function getIterator(): Traversable

return iterator

*Parameters*

    *none*

*return*

    Traversable

* * *