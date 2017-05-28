<?php
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\Category
 *
 * @property int $id
 * @property string $name
 * @property string $text_template
 * @method static \Illuminate\Database\Query\Builder|\App\Category whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Category whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Category whereTextTemplate($value)
 */
	class Category extends \Eloquent {}
}

namespace App{
/**
 * App\EmotionItems
 *
 * @property int $id
 * @property int $target
 * @property string $gender
 * @property string $mode
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\EmotionItems whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\EmotionItems whereGender($value)
 * @method static \Illuminate\Database\Query\Builder|\App\EmotionItems whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\EmotionItems whereMode($value)
 * @method static \Illuminate\Database\Query\Builder|\App\EmotionItems whereTarget($value)
 * @method static \Illuminate\Database\Query\Builder|\App\EmotionItems whereUpdatedAt($value)
 */
	class EmotionItems extends \Eloquent {}
}

namespace App{
/**
 * App\Item
 *
 * @property int $id
 * @property int $category_id
 * @property int $region_id
 * @property string $text
 * @method static \Illuminate\Database\Query\Builder|\App\Item whereCategoryId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Item whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Item whereRegionId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Item whereText($value)
 */
	class Item extends \Eloquent {}
}

namespace App{
/**
 * App\Participant
 *
 * @property int $id
 * @property int $edad
 * @property string $region
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Response[] $responses
 * @method static \Illuminate\Database\Query\Builder|\App\Participant whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Participant whereEdad($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Participant whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Participant whereRegion($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Participant whereUpdatedAt($value)
 */
	class Participant extends \Eloquent {}
}

namespace App{
/**
 * App\Region
 *
 * @property int $id
 * @property string $name
 * @method static \Illuminate\Database\Query\Builder|\App\Region whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Region whereName($value)
 */
	class Region extends \Eloquent {}
}

namespace App{
/**
 * App\Response
 *
 * @property int $id
 * @property int $item_id
 * @property int $participant_id
 * @property string $text
 * @property int $reaction_time
 * @method static \Illuminate\Database\Query\Builder|\App\Response whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Response whereItemId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Response whereParticipantId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Response whereReactionTime($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Response whereText($value)
 */
	class Response extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 */
	class User extends \Eloquent {}
}

