<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudentResource\Pages;
use App\Models\Student;
use App\Models\Course;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\Wizard\Step;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class StudentResource extends Resource
{
    protected static ?string $model = Student::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Wizard::make()
                    ->steps([
                        Step::make('Student Details')
                            ->schema([
                                TextInput::make('first_name')
                                    ->required()
                                    ->maxLength(255),
                                TextInput::make('last_name')
                                    ->required()
                                    ->maxLength(255),
                                DatePicker::make('birthday')
                                    ->required(),
                                TextInput::make('address')
                                    ->required()
                                    ->maxLength(500),
                                TextInput::make('contact_number')
                                    ->required()
                                    ->tel()
                                    ->maxLength(20),
                            ])
                            ->icon('heroicon-o-user')
                            ->description('Enter student personal details'),

                        Step::make('Course Details')
                            ->schema([
                                Select::make('course_id')
                                    ->label('Course Name')
                                    ->options(Course::pluck('name', 'id'))
                                    ->required()
                                    ->reactive()
                                    ->afterStateUpdated(function ($state, callable $set) {
                                        $course = Course::find($state);
                                        if ($course) {
                                            $set('department', $course->department);
                                            $set('fee', $course->fee);
                                        } else {
                                            $set('department', null);
                                            $set('fee', null);
                                        }
                                    }),

                                TextInput::make('department')
                                    ->label('Department')
                                    ->disabled()
                                    ->default(''),

                                TextInput::make('fee')
                                    ->label('Course Fee')
                                    ->disabled()
                                    ->default(''),
                            ])
                            ->icon('heroicon-o-book-open')
                            ->description('Select course and auto-fill details'),
                    ])
                    ->columns(1)
                    ->columnSpan('full')
                    ->maxWidth('7xl'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('first_name')->sortable()->searchable(),
            Tables\Columns\TextColumn::make('last_name')->sortable()->searchable(),
            Tables\Columns\TextColumn::make('birthday')->date()->sortable(),
            Tables\Columns\TextColumn::make('address')->limit(30),
            Tables\Columns\TextColumn::make('contact_number'),
            Tables\Columns\TextColumn::make('course.name')->label('Course'),
        ])
        ->filters([
            //
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\DeleteBulkAction::make(),
        ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStudents::route('/'),
            'create' => Pages\CreateStudent::route('/create'),
            'edit' => Pages\EditStudent::route('/{record}/edit'),
        ];
    }
}
