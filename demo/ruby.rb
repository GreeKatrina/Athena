module ExampleModule
  class ExampleClass::ScopeResolution < NewScope::Operator

    def initialize(options)
      @@class_var = options[:class]
      @instance_var = options[:instance]
    end

    def method
      puts 'doing stuff'
      yield if block_given?
      other_method(:arg)
    end

    def self.class_method
      return "I am a class method!"
    end

    private

    def other_method(*args)
      puts 'doing other stuff #{42}'
    end

    def self.private
      [1, 2, 3].each do |item|
        puts item
      end
    end

    private_class_method :private

    private

    def user_params
      params.require(:user).permit(:username, :email, :password)
      params.pluck(:user)

      PolicyRatingMapper.new(
        profile_rating_data_lookup_hash,
        @rules,
        @underwriting_rules,
        @as_of,
        :insurance_score_report => insurance_score_report,
        :fico_score_report => fico_score_report,
        :current_carrier_report => current_carrier_report,
        :prior_coverage_report => prior_coverage,
        :internal_insurance_score => internal_insurance_score
      ).data
    end
  end
end

ExampleModule::ExampleClass::ScopeResolution
example_instance = ExampleModule::ExampleClass::ScopeResolution.new(:arg)

example_instance.method(:arg) do
  puts 'yielding in block!'
end