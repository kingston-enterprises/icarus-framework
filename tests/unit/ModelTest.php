<?php


class ModelTest extends \PHPUnit\Framework\TestCase
{

    protected $model;

    public function setUp(): void
    {
        $this->model = new \kingston\icarus\Model;
    }

    /** @test  */
    public function test_loadData()
    {
        $this->model->first_name = '';
        $this->model->last_name = '';

        $data = [
            'first_name' => 'Billy',
            'last_name' => 'Billions'
        ];


        $this->model->loadData($data);

        $this->assertEquals('Billy', $this->model->first_name);
        $this->assertEquals('Billions', $this->model->last_name);
    }

    /** @test */
    public function test_getAttributes_return_array_of_model_attributes()
    {
        $this->model->first_name = '';
        $this->model->last_name = '';

        $this->model->setAttributes(
            ['first_name', 'last_name']
        );

        $this->assertIsArray($this->model->getAttributes());
        $this->assertEquals($this->model->getAttributes()[0], 'first_name');
        $this->assertNotEquals($this->model->getAttributes()[1], 'first_name');
    }

    /** @test */
    public function test_getLabel_returns_model_form_labels()
    {

        $this->model->first_name = '';
        $this->model->last_name = '';

        $this->model->setLabels(
            [
                'first_name' => 'First Name',
                'last_name' => 'Last Name'
            ]
        );


        $this->assertEquals('First Name', $this->model->getLabel('first_name'));
        $this->assertNotEquals('First Name', $this->model->getLabel('last_name'));
    }

    /**@test */
    public function test_getProp_return_model_property()
    {
        $this->model->id = 5;
        $this->model->first_name = 'First Name';
        $this->model->last_name = 'Last Name';

        $this->assertEquals(5, $this->model->getProp('id'));
        $this->assertEquals('First Name', $this->model->getProp('first_name'));
    }

    /** @test */
    public function test_setRules_sets_rules_for_only_existing_attributes()
    {
        $this->model->first_name = '';
        $this->model->last_name = '';

        $this->model->setRules(
            [
                'first_name' => [$this->model::RULE_REQUIRED],
                'last_name' => [$this->model::RULE_REQUIRED],
                'email' => [$this->model::RULE_REQUIRED]
            ]
        );

        $this->assertEquals($this->model->getRules()['first_name'], ['required']);
        $this->assertEquals($this->model->getRules()['last_name'], ['required']);
        $this->assertNotContains('email', $this->model->getRules());
    }

    /** @test */
    public function test_getRules_return_array_of_model_form_Rules()
    {
        $this->model->first_name = '';
        $this->model->last_name = '';
        $this->model->email = '';
        $this->model->password = '';
        $this->model->passwordConfirm = '';

        $this->model->setRules(
            [
                'first_name' => [$this->model::RULE_REQUIRED],
                'last_name' => [$this->model::RULE_REQUIRED],
                'email' => [$this->model::RULE_REQUIRED, $this->model::RULE_EMAIL, [
                    $this->model::RULE_UNIQUE, 'class' => $this->model::class
                ]],
                'password' => [$this->model::RULE_REQUIRED, [$this->model::RULE_MIN, 'min' => 8]],
                'passwordConfirm' => [[$this->model::RULE_MATCH, 'match' => 'password']]
            ]
        );

        $this->assertIsArray($this->model->getRules());
        $this->assertEquals($this->model->getRules()['first_name'], ['required']);
        $this->assertEquals($this->model->getRules()['last_name'], ['required']);
        $this->assertEquals($this->model->getRules()['email'], ['required', 'email', ['unique', 'class' => $this->model::class]]);
        $this->assertEquals($this->model->getRules()['password'], ['required', ['min', 'min' => 8]]);
        $this->assertEquals($this->model->getRules()['passwordConfirm'], [['match', 'match' => 'password']]);
    }

    /** @test */
    public function test_model_can_validate_with_rules()
    {
        $this->model->first_name = '';
        $this->model->last_name = '';

        $this->model->setRules(
            [
                'first_name' => [$this->model::RULE_REQUIRED],
                'last_name' => [$this->model::RULE_REQUIRED]
            ]
        );

        $data = [
            'first_name' => 'Billy',
            'last_name' => 'Billions'
        ];

        $this->model->loadData($data);


        $this->assertIsBool($this->model->validate());
        $this->assertEquals(true, $this->model->validate());
    }

    public function test_failed_validation_returns_error()
    {
        $this->model->first_name = '';
        $this->model->last_name = '';

        $this->model->setLabels(
            [
                'first_name' => 'First Name',
                'last_name' => 'Last Name'
            ]
        );

        $this->model->setRules(
            [
                'first_name' => [
                    $this->model::RULE_REQUIRED,
                    [$this->model::RULE_MIN, 'min' => 8]
                ],
                'last_name' => [
                    $this->model::RULE_REQUIRED, [$this->model::RULE_MAX, 'max' => 5],
                    [$this->model::RULE_MATCH, 'match' => 'first_name']
                ]
            ]
        );

        $data = [
            'last_name' => 'Billions',
            'email' => ''
        ];

        $this->model->loadData($data);

        $this->assertEquals(false, $this->model->validate());
        $this->assertNotEquals(false, $this->model->hasError('first_name'));
        $this->assertEquals(
            ['First Name is required', 'Minimum length of this field must be 8'],
            $this->model->hasError('first_name')
        ); $this->assertEquals(
            'First Name is required',
            $this->model->getFirstError('first_name')
        );
        $this->assertEquals(
            ['Maximum length of this field must be 5', 'This field must be the same as first_name'],
            $this->model->hasError('last_name')
        );
        $this->assertEquals(
            'Maximum length of this field must be 5',
            $this->model->getFirstError('last_name')
        );
    }
}
