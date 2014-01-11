# Sculpin parsedown

[Sculpin](http://sculpin.io) is a PHP static site generator, that use markdown file to store content. By default it's parse that files using [php-markdown](https://github.com/michelf/php-markdown), that is a nice PHP markdown parser, but do not support [flavored markdown from github](http://github.github.com/github-flavored-markdown/) and have some performance issues.

This use the awesome [parsedown](http://parsedown.org) library that is faster that php-markdown and support flavored markdown syntax.

# Performance

I used my blog as test platform with:
 * approx 100 posts
 * archive (paginated posts)
 * tags
 * categories
 * some static pages

Site is generated on a i7 CPU, an SSD disk and 16GB RAM.

#### Using [markdown](https://github.com/michelf/php-markdown):
~~~
real  0m8.954s
user  0m7.884s
sys   0m0.235s
~~~

#### Using [parsedown](http://parsedown.org):
~~~
real  0m6.115s
user  0m5.834s
sys   0m0.267s
~~~

the improvement is approx:
~~~
real  32%
user  26%
sys   12%
~~~

average **29%** of improvement.

# Installation

To install add in your ```sculpin.json``` file the following package declaration:

~~~
{
    "require": {
        "mavimo/sculpin-parsedown": "@dev"
    }
}
~~~

Now you can update using ```sculpin update``` command.

After that add the following definition in the ```sculpin_kernel.yml```:

~~~yaml
sculpin_markdown:
   parser_class: Mavimo\Sculpin\Bundle\ParsedownBundle\ParsedownConverter
~~~

Sculpin have a declared dependencie in bundle, so we need to manually patch it, in file:

~~~
src/Sculpin/Bundle/MarkdownBundle/MarkdownConverter.php
~~~

remove from line 14:

~~~php
use Michelf\Markdown;
~~~

and transform line 48 from:

~~~php
    public function __construct(Markdown $markdown, array $extensions = array())
~~~

to

~~~php
    public function __construct(Markdown $markdown, array $extensions = array())
~~~
removing ```Markdown``` variable definition.
